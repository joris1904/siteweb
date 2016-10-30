<?php

/**
* Class BootstrapForm
*/
class BootstrapForm extends Form
{
	
	

	/**
    * @param $name
    * @param null $label
    * @param array $options
    * @return string
    */
    public function input_horizontal($name,$label = null, $options = []){
        
        $type = isset($options['type']) ? $options['type'] : 'text';
        $attr ='';
        foreach($options as $k=>$v){ if($k!='type'){
            $attr .= " $k='$v' ";
        }}
        
        if (isset($label)) {
            if ($label != null) {
                $label = "<label class='joris-xs-12 joris-md-2  joris-lg-2 control-label' id='input$name' > $label </label>";
            }
        }
        $html = "<div class='joris-xs-12 joris-md-10 joris-lg-10 '>";
        $html .= "<input id='input$name' type='$type' name='$name' value=\"". $this->getValue($name) ."\"' $attr>";
        $html .= "</div>";
        return $this->tags($label . $html);
    }

    public function select_horizontal ($name, $label,$options = []){
        $tabs = [];
        $attr = '';
        if (isset($label)) {
            if ($label != null) {
                $label = "<label class='joris-xs-12 joris-md-2  joris-lg-2 control-label' id='input$name' > $label </label>";
            }
        }
        
        foreach ($options as $k=>$v) {
            if ($k != 'type' && $k != 'boost' && $k != 'options') {
                $attr .= " $k='$v' ";
            }
        }
        $html = "<div class='joris-xs-12 joris-md-10 joris-lg-10 '>";
        $html .= "<select name='$name' $attr>";
            foreach ($options['options'] as $k => $v) {
                if ($this->getValue($name) == $k) {
                    $selected = "selected";
                } else {
                    $selected = "";
                }
                $html .= "<option value='$k' $selected> $v </option>";
            }
        $html .= "</select>";
        $html .= "</div>";

        return $this->tags($label . $html);
    }
    public function checkbox_horizontal($name,$label = null,$options = array()) {

        $type = isset($options['type']) ? $options['type'] : 'checkbox';

        $attr = '';
        if (isset($label)) {
            if ($label != null) {
                $label = "<label class='joris-xs-12 joris-md-2  joris-lg-2 control-label' id='input$name' > $label </label>";
            }
        }
        
        foreach ($options as $k=>$v) {
            if ($k != 'type' && $k != 'boost' && $k != 'message') {
                $attr .= " $k='$v' ";
            }
        }
        

        $value = $this->getValue($name);
        $html = "<div class='joris-xs-12 joris-md-10 joris-lg-10 '>";
        $html .= "<input type='hidden' name='$name' value='0'> <input type='$type' name='$name' value='1' ". (empty($value && $value != 0) ? '' : 'checked') .">  ";
        if ($options['message']) {
            $html .= $options['message'];
        }
        $html .= "</div>";
        return $this->tags($label . $html);


    }

    public function submit_horizontal($name = 'Envoyer', $options = []){
        $attr = '';
      
        foreach ($options as $k=>$v) {
            if ($k != 'type' && $k != 'boost' && $k != 'options') {
                $attr .= " $k='$v' ";
            }
        }

        $html  = "<label class='joris-xs-12 joris-md-2  joris-lg-2 control-label'  >&nbsp;</label>";
        $html .= "<div class='joris-xs-12 joris-md-10 joris-lg-10 '>";
        $html .= "<button type='submit' $attr>$name</button>";
        if (isset($options['retour'])) {
            $html .= '<a '. $attr .' href="'. @$_SERVER['HTTP_REFERER'] .'" title="">'. $options['retour'] .'</a>';
        }
        $html .= "</div>";
        return $this->tags($html);
    }



    public function input_inline($name,$icon = 'user',$options = []){
        $type = isset($options['type']) ? $options['type'] : 'text';
        $attr ='';
        foreach($options as $k=>$v){ if($k!='type'){
            $attr .= " $k='$v' ";
        }}
        $html    = '<div class="input-group">';
        $html   .= '<div class="input-group-addon">';
        $html   .= '<i class="fa fa-fw fa-'.$icon.'"></i>';
        $html   .= '</div>';
        $html   .= "<input id='input$name' type='$type' name='$name' value=\"". $this->getValue($name) ."\"' $attr>";
        $html   .= '</div>';
        return $this->tags($html);
    }
	public function tags($html) {
		return "<div class='form-group'>$html</div>";
	}
	
}