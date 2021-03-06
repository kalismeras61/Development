<?php namespace ZN\DataTypes\Arrays;

class RemoveElement implements RemoveElementInterface
{
    //--------------------------------------------------------------------------------------------------------
    //
    // Author     : Ozan UYKUN <ozanbote@gmail.com>
    // Site       : www.znframework.com
    // License    : The MIT License
    // Copyright  : (c) 2012-2016, znframework.com
    //
    //--------------------------------------------------------------------------------------------------------

    //--------------------------------------------------------------------------------------------------------
    // Remove Key
    //--------------------------------------------------------------------------------------------------------
    //
    // @param array $array
    // @param mixed $keys
    //
    //--------------------------------------------------------------------------------------------------------
    public function key(Array $array, $keys) : Array
    {
        if( ! is_array($keys) )
        {
            unset($array[$keys]);
        }
        else
        {
            foreach( $keys as $key )
            {
                unset($array[$key]);
            }
        }

        return $array;
    }

    //--------------------------------------------------------------------------------------------------------
    // Remove Value
    //--------------------------------------------------------------------------------------------------------
    //
    // @param array $array
    // @param mixed $values
    //
    //--------------------------------------------------------------------------------------------------------
    public function value(Array $array, $values) : Array
    {
        return $this->element($array, $values);
    }

    //--------------------------------------------------------------------------------------------------------
    // Remove
    //--------------------------------------------------------------------------------------------------------
    //
    // @param array $array
    // @param mixed $keys
    // @param mixed $values
    //
    //--------------------------------------------------------------------------------------------------------
    public function use(Array $array, $keys, $values) : Array
    {
        if( ! empty($keys) )
        {
            $array = $this->key($array, $keys);
        }

        if( ! empty($values) )
        {
            $array = $this->value($array, $values);
        }

        return $array;
    }

    //--------------------------------------------------------------------------------------------------------
    // Remove Last
    //--------------------------------------------------------------------------------------------------------
    //
    // @param array   $array
    // @param numeric $count
    //
    //--------------------------------------------------------------------------------------------------------
    public function last(Array $array, Int $count = 1, $type = 'array_pop') : Array
    {
        if( $count <= 1 )
        {
            $type($array);
        }
        else
        {
            $arrayCount = count($array);

            for( $i = 1; $i <= $count; $i++ )
            {
                $type($array);

                if( $i === $arrayCount )
                {
                    break;
                }
            }
        }

        return $array;
    }

    //--------------------------------------------------------------------------------------------------------
    // Remove First
    //--------------------------------------------------------------------------------------------------------
    //
    // @param array   $array
    // @param numeric $count
    //
    //--------------------------------------------------------------------------------------------------------
    public function first(Array $array, Int $count = 1) : Array
    {
        return $this->last($array, $count, 'array_shift');
    }

    //--------------------------------------------------------------------------------------------------------
    // Delete Element
    //--------------------------------------------------------------------------------------------------------
    //
    // @param array $array
    // @param mixed $object
    //
    //--------------------------------------------------------------------------------------------------------
    public function element(Array $array, $object) : Array
    {
        if( ! is_array($object) )
        {
            $object = [$object];
        }

        return array_diff($array, $object);
    }
}
