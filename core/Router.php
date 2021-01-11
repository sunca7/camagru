<?php


namespace app\core;

class Router
{
    public Request $request;
    public Response $response;
    protected array $routes = [];

    public function __construct(Request $request, Response $response)
    {
        $this->request = $request;
        $this->response = $response;
    }

    // uri with get method -> callback   ex) get with /user
    public function get($path, $callback)
    {
        $this->routes['get'][$path] = $callback;
    }

    // uri with post method -> callback, ex) post with /user
    public function post($path, $callback)
    {
        $this->routes['post'][$path] = $callback;
    }

    // Find path, method => execute callback => render view
    public function resolve()
    {
        $path = $this->request->getPath();
        $method = $this->request->method();
        $callback = $this->routes[$method][$path] ?? false;

        if ($callback === false) {
            $this->response->setStatusCode(404);
            return $this->renderView("_404");
        }
        if (is_string($callback)) {
            return $this->renderView($callback);
        }

        // $callback can be an array
        return call_user_func($callback, $this->request);
    }

    public function renderView($view, $params = [])
    {
        // layout is 안변하는 ㅃㅕ대
        $layoutContent = $this->layoutContent();

        // view 변하는 내용
        $viewContent = $this->renderOnlyView($view, $params);

        // 뼈대 안에 변해는 내용 집어 넣
        return str_replace('{{content}}', $viewContent, $layoutContent);
    }

    //main.php = nav + footer?기 뼈대
    protected function layoutContent()
    {
        //뼈대를 읽어 string으로 변환하기
        ob_start();
        include_once Application::$ROOT_DIR . "/views/layouts/main.php";
        include_once Application::$ROOT_DIR . "/views/layouts/main.php";
        return ob_get_clean();
    }

    //real content
    protected function renderOnlyView($view, $params = [])
    {
        //내용에 param 추가하기
        foreach ($params as $key => $value) {
            $$key = $value;
        }
        ob_start();
        include_once __DIR__ . "/../views/$view.php";
        return ob_get_clean();
    }
}