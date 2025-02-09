<?php
define("LOGGER", LoggerFactory::createLogger(FrontController::class));

class FrontController
{

    public function index()
    {
        $requestContext = RequestContext::createFromGlobals();
        LOGGER->info("Started request handling. Request context: %s", $requestContext);

        $this->handleHomePage($requestContext);
        $this->handleAboutPage($requestContext);
        $this->handleSamplePage($requestContext);
        $this->handleSomeSomePage($requestContext);
    }

    private function handleSomeSomePage(RequestContext $requestContext) {
        if ($requestContext->getUri() == "/someSome") {
            
            $renderTemplate = function() {
                echo "<body>";
                echo "<h1>Some Some Some</h1>";
                echo "</body>";
            };
        
            $renderTemplate();
        }
    }


    private function handleSamplePage($requestContext) {
        if ($requestContext->getMethod() == HttpMethod::GET) {
            if ($requestContext->getUri() == "/sample") {
                echo 'Sample page';
            }
        }
    }

    private function handleHomePage($requestContext)
    {
        if ($requestContext->getMethod() === HttpMethod::GET) {
            if ($requestContext->getUri() == '/home') {
                echo "HOME PAGE";
            }
        }
    }

    private function handleAboutPage($requestContext)
    {
        if ($requestContext->getMethod() == HttpMethod::GET) {
            if ($requestContext->getUri() == '/about') {
                echo "<h1>About Page</h1>";
            }
        }
    }
}