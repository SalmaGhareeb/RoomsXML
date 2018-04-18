<?php

namespace SalmaAbdelhady\RoomsXML\Request;

use SalmaAbdelhady\RoomsXML\Core\ValidatorFactory;
use SalmaAbdelhady\RoomsXML\Exception\RoomsXMLException;

/**
 * Class AbstractRequest
 *
 * @package SalmaAbdelhady\RoomsXML\Request
 */
abstract class AbstractRequest
{

    public $errors     = [];
    public $rules      = [];
    public $attributes = [];


    /**
     * @param array $payload
     *
     * @return \SalmaAbdelhady\RoomsXML\Request\AbstractRequest
     * @throws \SalmaAbdelhady\RoomsXML\Exception\RoomsXMLException
     * @author Salma Abdelhady <salma.abdelhady@tajawal.com>
     */
    public function load(array $payload): self
    {
        $attributes = $this->getAttributes();
        foreach ($attributes as $attribute) {
            if (isset($payload[$attribute])) {
                if (\is_array($payload[$attribute])) {
                    $payload[$attribute] = array_filter($payload[$attribute], function ($item) {
                        return !empty($item);
                    });
                }

                if (!empty($payload[$attribute])) {
                    $this->{$attribute} = $payload[$attribute] ?? '';
                }
            }
        }

        if (!$this->validate()) {
            throw new RoomsXMLException($this->getErrorsMessages());
        }

        return $this;
    }

    /**
     * @return $this|bool
     * @author Salma Abdelhady <salma.abdelhady@tajawal.com>
     */
    public function validate(): bool
    {
        if (empty($this->rules)) {
            return $this;
        }

        $data = $this->toArray();
        $data = array_filter($data, function ($item) {
            return $item !== null;
        });

        $validator = new ValidatorFactory();
        $validator = $validator->make($data, $this->rules);

        if ($validator->fails()) {
            $this->errors = $validator->errors();

            return false;
        }

        return true;
    }

    /**
     * @return array
     * @author Salma Abdelhady <salma.abdelhady@tajawal.com>
     */
    public function toArray(): array
    {
        return json_decode(json_encode($this), true);
    }

    /**
     * @return array
     */
    public function getRules(): array
    {
        return $this->rules;
    }


    /**
     * @return array
     */
    public function getAttributes(): array
    {
        return $this->attributes;
    }

    /**
     * @return string
     */
    public function getErrorsMessages(): string
    {
        return !empty($this->errors) ? $this->errors->first() : '';
    }
}