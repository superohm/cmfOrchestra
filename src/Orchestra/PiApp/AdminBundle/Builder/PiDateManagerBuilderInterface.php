<?php
/**
 * This file is part of the <Admin> project.
 *
 * @category   Admin_Builders
 * @package    Builder
 * @author (c) <etienne de Longeaux> <etienne.delongeaux@gmail.com>
 * @since 2012-01-18
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace PiApp\AdminBundle\Builder;

/**
 * PiDateManagerBuilderInterface interface.
 *
 * @category   Admin_Builders
 * @package    Builder
 *
 * @author (c) <etienne de Longeaux> <etienne.delongeaux@gmail.com>
 */
interface PiDateManagerBuilderInterface
{
    public function parse($date, $locale = null);
    public function format($date, $dateType = 'medium', $timeType = 'none', $locale = null, $pattern = null);
    public function relative_time($when, $from = null);
}