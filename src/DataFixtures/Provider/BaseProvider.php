<?php


namespace App\DataFixtures\Provider;


abstract class BaseProvider
{
    /**
     * Contains all information about the universe
     *
     * @var array
     */
    protected const UNIVERS = [];

    /**
     * Contains all information from all categories in the universe
     *
     * @var array
     */
    protected const CATEGORIES = [];

    /**
     * Contains all subcategories information related to categories
     *
     * @var array
     */
    protected const SUBCATEGORIES = [];

    /**
     * @return array
     */
    public static function getUnivers()
    {
        return static::UNIVERS;
    }

    /**
     * @return array
     */
    public static function getCategories()
    {
        return static::CATEGORIES;
    }

    /**
     * @return array
     */
    public static function getSubcategories()
    {
        return static::SUBCATEGORIES;
    }
}