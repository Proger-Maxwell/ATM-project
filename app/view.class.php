<?PHP
class View {
   
    protected $_template;
    protected $_data = array();
   
    public function __construct($template)
    {
        if (file_exists($template))
        {
            $this->_template = $template;
        }
        else
        {
            exit('File ' . $template . ' not exists.');
        }
    }
   
    public function __set($key, $value)
    {
        $this->_data[$key] = $value;
    }
   
    public function block($template_block, array $data = NULL)
    {
        if (file_exists($template_block))
        {
            if ($data !== NULL) extract($data);
            ob_start();
            require $template_block;
            $out = ob_get_contents();
            ob_end_clean();
            return $out;
        }
        else
        {
            return 'File ' . $template_block . ' not exists.';
        }
    }
   
    public function display()
    {
        extract($this->_data);
        require ($this->_template);
    }
   
}
?>