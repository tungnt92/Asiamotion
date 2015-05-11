<?php
            $idmenu = JFactory::getApplication();
//            $menu = $idmenu->getMenu()->getActive()->note;
              $menu = $idmenu->getMenu()->getActive()->id;
//            $title= $idmenu->getMenu()->getActive()->title;
//            $image= $idmenu->getMenu()->getActive()->params;
//            $images = json_decode($image);
            if($menu==114||$menu==115||$menu==116||$menu==117||$menu==118||$menu==119||$menu==158||$menu==159||$menu==160){
                    include_once('templates/'.$this->template.'/all_page.php');

            }elseif ($menu==101) {
                    include_once('templates/'.$this->template.'/home.php');

            }elseif ($menu==150) {
                    include_once('templates/'.$this->template.'/event.php');

            }elseif($menu==151){
                    include_once('templates/'.$this->template.'/news.php');

            }
            elseif($menu==161){
                    include_once('templates/'.$this->template.'/news.php');

            }
            

   ?>