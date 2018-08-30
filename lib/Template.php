<?php class Template{
    //Path to template
    protected $template;
    //variables passed in
    protected $vars = array();

    //constructor
    public function __construct($template)
    {
        $this->template = $template;
    }
    public function __get($key)
    {
        // TODO: Implement __get() method.
        return $this->vars[$key];
    }
    public function  __set($key, $value)
    {
        // TODO: Implement __set() method.
        return $this->vars[$key] = $value;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        // TODO: Implement __toString() method.
        extract($this->vars);
        chdir(dirname($this->template));
        ob_start();

        include basename($this->template);

        return ob_get_clean();
    }
}