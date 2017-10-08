<?php

    namespace Core;

    /**
     * Class Router
     *
     * @access  public
     * @package Core
     */
    class Router
    {
        private $request;
        private $response;

        /**
         * Router constructor.
         *
         * @access
         * @param Request $req
         * @param Response $res
         */
        public function __construct($req, $res)
        {
            $this->request = $req;
            $this->response = $res;
            $this->handleRouting();
        }

        /**
         * Handle the routing/error responses
         * @access public
         * @return bool
         */
        private function handleRouting() : bool
        {
            $match = $this->matchMaker();
            if ($match == false) {
                $this->routeError($this->response, 404);
                return false;
            }
            list($controller, $action) = explode('@', $match['target']);
            $obj = $this->controllerMaker($controller);
            if ($obj === null) {
                $this->routeError($this->response, 500);
                return false;
            }
            if (!is_callable(array($obj, $action))) {
                $this->routeError(500);
                return false;
            }
            $obj->{$action}($this->request, $this->response, $match['params']);
            return true;
        }

        public function routeError($code)
        {
            $this->request->headers->set('Content-Type', 'application/json');
            $message = 'Ops, you don\'t have mana';
            if ($code == 404) {
                $message = 'Route not found';
            }
            $this->request->setStatusCode($code);
            $this->request->setContent(
                json_encode([
                    'type'    => 'error',
                    'message' => $message
                ])
            );
            return $this->request->send();
        }

        public function matchMaker()
        {
            $router = new \AltoRouter();
            include '../routes/route.php';
            return $router->match();
        }

        public function controllerMaker($controller)
        {
            $controller = 'App\\Controllers\\' . $controller;
            if (!class_exists($controller)) {
                return null;
            }
            return new $controller;
        }
    }
