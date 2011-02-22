<?php
/**
 * Zend Framework for Xoops Engine
 *
 * You may not change or alter any portion of this comment or credits
 * of supporting developers from this source code or any supporting source code
 * which is considered copyrighted (c) material of the original comment or credit authors.
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
 *
 * @copyright       The Xoops Engine http://sourceforge.net/projects/xoops/
 * @license         http://www.fsf.org/copyleft/gpl.html GNU public license
 * @author          Taiwen Jiang <phppp@users.sourceforge.net>
 * @since           3.0
 * @category        Xoops_Zend
 * @package         Controller
 * @version         $Id$
 */

/**
 * Ruby routing based Router.
 *
 * @package    Xoops_Zend
 * @subpackage Router
 */
class Xoops_Zend_Controller_Router_Admin extends Xoops_Zend_Controller_Router_Application
{
    //public $section = 'admin';
    //public $route = 'admin';

    /**
     * Array of invocation parameters to use when instantiating action
     * controllers
     * @var array
     */
    protected $_invokeParams = array(
        'section'   => 'admin',
        'route'     => 'admin',
    );
}