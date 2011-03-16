<?php
/**
 * Created by PhpStorm.
 * User: Patrik
 * Date: 16.03.2011
 * Time: 19:49:50
 * To change this template use File | Settings | File Templates.
 */
 
class Utils {

    static function beginsWith( $str, $sub ) {
        return ( substr( $str, 0, strlen( $sub ) ) === $sub );
    }

    static function endsWith( $str, $sub ) {
        return ( substr( $str, strlen( $str ) - strlen( $sub ) ) === $sub );
    }
}
