<?php

/**
* Form default
*/
class Form 
{
	public $surround = 'p';

	public $data;

	public function input($name,$label,$options = array()){


	    $type = isset($options['type']) ? $options['type'] : 'text';
	    $attr = '';

	    $tabs = [];
	if (isset($label)) {
	            if ($label != null) {
	                $label = "<label id='input$name' > $label </label><br>";
	            }
	        }

	    
	    foreach ($options as $k=>$v) {
	        if ($k != 'type' && $k != 'boost') {
	            $attr .= " $k='$v' ";
	        }
	    }



	    $html = "<input id='input".ucfirst($name)."' type='$type' name='$name'  value='". $this->getValue($name) ."' $attr >";

	    return $this->tags($label . $html);
	}

	public function textarea($name,$label ,$options = array()){

	   $tabs = [];
	   $attr = '';
	   if (isset($label)) {
	            if ($label != null) {
	                $label = "<label id='input$name' > $label </label><br>";
	            }
	        }

	    if (isset($options['boost'])) {
	        $tabs[] = $options['boost'];
	    }
	    foreach ($options as $k=>$v) {
	        if ($k != 'type' && $k != 'boost') {
	            $attr .= " $k='$v' ";
	        }
	    }


	    $html = "<textarea id='input".ucfirst($name)."' name='$name' $attr>". $this->getValue($name) ."</textarea>";

	    return $this->tags($label . $html);
	}

	public function checkbox($name,$label = null,$options = array()) {

	    $type = isset($options['type']) ? $options['type'] : 'checkbox';

	    $attr = '';
	    if (isset($label)) {
	            if ($label != null) {
	                $label = "<label id='input$name' > $label </label>";
	            }
	        }
	    
	    foreach ($options as $k=>$v) {
	        if ($k != 'type' && $k != 'boost' && $k != 'message') {
	            $attr .= " $k='$v' ";
	        }
	    }
	    

	    $value = $this->getValue($name);

	    $html = "<input type='hidden' name='$name' value='0'> <input type='$type' name='$name' value='1' ". (empty($value && $value != 0) ? '' : 'checked') .">  ";
	    if ($options['message']) {
	        $html .= $options['message'];
	    }
	    return $this->tags($label . $html);


	}

	/**
	 * [select description]
	 * @param  [type] $name    [description]
	 * @param  [type] $label   [description]
	 * @param  array  $options [description]
	 * @return [type]          [description]
	 */
	public function select ($name, $label,$options = []){
	    $tabs = [];
	    $attr = '';
	    if (isset($label)) {
	            if ($label != null) {
	                $label = "<label id='input$name' > $label </label><br>";
	            }
	        }

	    if (isset($options['boost'])) {
	        $tabs[] = $options['boost'];
	    }
	    foreach ($options as $k=>$v) {
	        if ($k != 'type' && $k != 'boost' && $k != 'options') {
	            $attr .= " $k='$v' ";
	        }
	    }

	    $html = "<select name='$name' $attr>";
	        foreach ($options['options'] as $k => $v) {
	            if ($this->getValue($name) == $k) {
	                $selected = "selected";
	            } else {
	                $selected = "";
	            }
	            $html .= "<option value='$k' $selected> $v </option>";
	        }
	    $html .= "</select>";

	    return $this->tags($label . $html);
	}
	public function submit($name = 'Envoyer', $options = []){
	    $attr = '';
	  
	    foreach ($options as $k=>$v) {
	        if ($k != 'type' && $k != 'boost' && $k != 'options') {
	            $attr .= " $k='$v' ";
	        }
	    }
	    return $this->tags("<button type='submit' $attr>$name</button>");
	}


	protected function getValue($name) {
	    return isset($_POST[$name]) ? $_POST[$name] : null;
	}

	public function tags($html){
	    
	    return "<{$this->surround} >$html</{$this->surround}>";
	}
}