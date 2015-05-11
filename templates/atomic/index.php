<?php
            $idmenu = JFactory::getApplication();
			$menu = $idmenu->getMenu()->getActive()->id;
            if($menu==114||$menu==115||$menu==116||$menu==117||$menu==119){
                    include_once('templates/'.$this->template.'/all_page.php');

            }elseif ($menu==101) {
                    include_once('templates/'.$this->template.'/home.php');

            }elseif ($menu==150) {
                    include_once('templates/'.$this->template.'/event.php');

            }elseif($menu==151||$menu==157){
                    include_once('templates/'.$this->template.'/news.php');
            }elseif($menu==161){
                    include_once('templates/'.$this->template.'/sub_school_trip.php');
            }elseif($menu==158||$menu==159||$menu==160){
                    include_once('templates/'.$this->template.'/all_sub_page.php');
            }elseif($menu==118){
                    include_once('templates/'.$this->template.'/about_us.php');
            }elseif($menu==162){
                    include_once('templates/'.$this->template.'/genlinkevent.php');
            }
   ?>