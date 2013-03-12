<?php

    /**
	 * You can select a Direction from here using
	 * Direction::Top_Left
	 * and pass that into a method in Background
	 * for a direction.
	 * We will start at the direction specified and move to the opposite direction.
	 */
	class Direction {
		const Top_Left = 0;
		const Top_Right = 1;
		const Bottom_Left = 2;
		const Bottom_Right = 3;
	}
	
	class Background {
		
        /**
         * Here, we get the styling for having a gradient color with three colors
         * 
         */
		public static function getBackground($color1, $color2, $color3, $direction, $type = "background-image"){
            
            switch($direction){
                case 0:
                    $start = "left";
                    $direction = "top left";
                    $end = "bottom right";
                    break;
                case 1:
                    $start = "";
                    $direction = "top right";
                    $end = "bottom left";
                    break;
                case 2:
                    $start = "bottom left";
                    $direction = "bottom left";
                    $end = "top right";
                    break;
                case 3:
                    $start = "bottom";
                    $direction = "bottom right";
                    $end = "top left";
                    break;
            }
			$style = "{ $type:linear-gradient($start, $color1, $color2, $color3);
                       $type: -o-linear-gradient($start, $color1, $color2, $color3);
                       $type: -moz-linear-gradient($start, $color1, $color2, $color3);
                       $type: -webkit-linear-gradient($start, $color1, $color2, $color3);
                       $type: -ms-linear-gradient($start, $color1, $color2, $color3);
                       $type: -webkit-gradient(
                            linear,
	                        $direction,
	                        $end,
	                        color-stop(0.25, $color1),
	                        color-stop(0.50, $color2),
	                        color-stop(0.75, $color3)
                            );
"//."						background-repeat:no-repeat;
."}";
            
            return $style;
            
		}
	}

?>