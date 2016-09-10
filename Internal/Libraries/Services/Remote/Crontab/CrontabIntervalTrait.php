<?php namespace ZN\Services\Remote;

use Exceptions;

trait CrontabIntervalTrait
{
    //--------------------------------------------------------------------------------------------------------
    //
    // Author     : Ozan UYKUN <ozanbote@gmail.com>
    // Site       : www.znframework.com
    // License    : The MIT License
    // Telif Hakkı: Copyright (c) 2012-2016, znframework.com
    //
    //--------------------------------------------------------------------------------------------------------

    //--------------------------------------------------------------------------------------------------------
    // Interval
    //--------------------------------------------------------------------------------------------------------
    //
    // @var string
    //
    //--------------------------------------------------------------------------------------------------------
    protected $interval = '* * * * *';

    //--------------------------------------------------------------------------------------------------------
    // Minute
    //--------------------------------------------------------------------------------------------------------
    //
    // @var string
    //
    //--------------------------------------------------------------------------------------------------------
    protected $minute = '*';

    //--------------------------------------------------------------------------------------------------------
    // Hour
    //--------------------------------------------------------------------------------------------------------
    //
    // @var string
    //
    //--------------------------------------------------------------------------------------------------------
    protected $hour = '*';

    //--------------------------------------------------------------------------------------------------------
    // Day Number
    //--------------------------------------------------------------------------------------------------------
    //
    // @var string
    //
    //--------------------------------------------------------------------------------------------------------
    protected $dayNumber = '*';

    //--------------------------------------------------------------------------------------------------------
    // Month
    //--------------------------------------------------------------------------------------------------------
    //
    // @var string
    //
    //--------------------------------------------------------------------------------------------------------
    protected $month = '*';

    //--------------------------------------------------------------------------------------------------------
    // Day
    //--------------------------------------------------------------------------------------------------------
    //
    // @var string
    //
    //--------------------------------------------------------------------------------------------------------
    protected $day = '*';

    //--------------------------------------------------------------------------------------------------------
    // Month Format
    //--------------------------------------------------------------------------------------------------------
    //
    // @var array
    //
    //--------------------------------------------------------------------------------------------------------
    protected $monthFormat = array
    (
        'january'   => 1,
        'february'  => 2,
        'march'     => 3,
        'april'     => 4,
        'may'       => 5,
        'june'      => 6,
        'july'      => 7,
        'august'    => 8,
        'september' => 9,
        'october'   => 10,
        'november'  => 11,
        'december'  => 12
    );

    //--------------------------------------------------------------------------------------------------------
    // Day Format
    //--------------------------------------------------------------------------------------------------------
    //
    // @var array
    //
    //--------------------------------------------------------------------------------------------------------
    protected $dayFormat = array
    (
        'sunday'    => 0,
        'monday'    => 1,
        'tuesday'   => 2,
        'wednesday' => 3,
        'thursday'  => 4,
        'friday'    => 5,
        'saturday'  => 6
    );

    //--------------------------------------------------------------------------------------------------------
    // Protected Slashes
    //--------------------------------------------------------------------------------------------------------
    //
    // @param  string $data
    // @return string
    //
    //--------------------------------------------------------------------------------------------------------
    protected function _slashes($data)
    {
        if( $data[0] === '/' )
        {
            return prefix($data, '*');
        }

        return $data;
    }

    //--------------------------------------------------------------------------------------------------------
    // Hourly
    //--------------------------------------------------------------------------------------------------------
    //
    // @param  string void
    // @return object
    //
    //--------------------------------------------------------------------------------------------------------
    public function hourly() : InternalCrontab
    {
        $this->interval = '0 * * * *';

        return $this;
    }

    //--------------------------------------------------------------------------------------------------------
    // Daily
    //--------------------------------------------------------------------------------------------------------
    //
    // @param  string void
    // @return object
    //
    //--------------------------------------------------------------------------------------------------------
    public function daily() : InternalCrontab
    {
        $this->interval = '0 0 * * *';

        return $this;
    }

    //--------------------------------------------------------------------------------------------------------
    // Midnight
    //--------------------------------------------------------------------------------------------------------
    //
    // @param  string void
    // @return object
    //
    //--------------------------------------------------------------------------------------------------------
    public function midnight() : InternalCrontab
    {
        $this->daily();

        return $this;
    }

    //--------------------------------------------------------------------------------------------------------
    // Monthly
    //--------------------------------------------------------------------------------------------------------
    //
    // @param  string void
    // @return object
    //
    //--------------------------------------------------------------------------------------------------------
    public function monthly() : InternalCrontab
    {
        $this->interval = '0 0 1 * *';

        return $this;
    }

    //--------------------------------------------------------------------------------------------------------
    // Weekly
    //--------------------------------------------------------------------------------------------------------
    //
    // @param  string void
    // @return object
    //
    //--------------------------------------------------------------------------------------------------------
    public function weekly() : InternalCrontab
    {
        $this->interval = '0 0 * * 0';

        return $this;
    }

    //--------------------------------------------------------------------------------------------------------
    // Yearly
    //--------------------------------------------------------------------------------------------------------
    //
    // @param  string void
    // @return object
    //
    //--------------------------------------------------------------------------------------------------------
    public function yearly() : InternalCrontab
    {
        $this->interval = '0 0 1 1 *';

        return $this;
    }

    //--------------------------------------------------------------------------------------------------------
    // Annualy
    //--------------------------------------------------------------------------------------------------------
    //
    // @param  string void
    // @return object
    //
    //--------------------------------------------------------------------------------------------------------
    public function annualy() : InternalCrontab
    {
        $this->yearly();

        return $this;
    }

    //--------------------------------------------------------------------------------------------------------
    // Clock
    //--------------------------------------------------------------------------------------------------------
    //
    // @param  string $clock: 24:59
    // @return object
    //
    //--------------------------------------------------------------------------------------------------------
    public function clock(String $clock = '23:59') : InternalCrontab
    {
        $match = '[0-9]{1,2}';

        if( ! preg_match('/^'.$match.':'.$match.'$/', $clock) )
        {
            return Exceptions::throws('Services', 'crontab:timeFormatError');
        }
        else
        {
            $clockEx  = explode(':', $clock);

            $this->minute($clockEx[1]);
            $this->hour($clockEx[0]);
        }

        return $this;
    }

    //--------------------------------------------------------------------------------------------------------
    // Minute
    //--------------------------------------------------------------------------------------------------------
    //
    // @param  string $minute: *
    // @return object
    //
    //--------------------------------------------------------------------------------------------------------
    public function minute(String $minute = '*') : InternalCrontab
    {
        $this->minute = $this->_slashes($minute);

        return $this;
    }

    //--------------------------------------------------------------------------------------------------------
    // Hour
    //--------------------------------------------------------------------------------------------------------
    //
    // @param  string $hour: *
    // @return object
    //
    //--------------------------------------------------------------------------------------------------------
    public function hour(String $hour = '*') : InternalCrontab
    {
        $this->hour = $this->_slashes($hour);

        return $this;
    }

    //--------------------------------------------------------------------------------------------------------
    // Day Number
    //--------------------------------------------------------------------------------------------------------
    //
    // @param  string $dayNumber: *
    // @return object
    //
    //--------------------------------------------------------------------------------------------------------
    public function dayNumber(String $dayNumber = '*') : InternalCrontab
    {
        $this->dayNumber = $this->_slashes($dayNumber);

        return $this;
    }

    //--------------------------------------------------------------------------------------------------------
    // Month Number
    //--------------------------------------------------------------------------------------------------------
    //
    // @param  string $monthNumber: *
    // @return object
    //
    //--------------------------------------------------------------------------------------------------------
    public function month(String $monthNumber = '*') : InternalCrontab
    {
        $this->_format('monthFormat', __FUNCTION__, $monthNumber );

        return $this;
    }

    //--------------------------------------------------------------------------------------------------------
    // Day
    //--------------------------------------------------------------------------------------------------------
    //
    // @param  string $day: *
    // @return object
    //
    //--------------------------------------------------------------------------------------------------------
    public function day(String $day = '*') : InternalCrontab
    {
        $this->_format('dayFormat', __FUNCTION__, $day);

        return $this;
    }

    //--------------------------------------------------------------------------------------------------------
    // Interval
    //--------------------------------------------------------------------------------------------------------
    //
    // @param  string $interval: * * * * *
    // @return object
    //
    //--------------------------------------------------------------------------------------------------------
    public function interval(String $interval = '* * * * *') : InternalCrontab
    {
        $this->interval = $interval;

        return $this;
    }

    //--------------------------------------------------------------------------------------------------------
    // Protected Format
    //--------------------------------------------------------------------------------------------------------
    //
    // @param  string $varname: empty
    // @param  string $objectname: empty
    // @param  string $data: empty
    // @return void
    //
    //--------------------------------------------------------------------------------------------------------
    protected function _format($varname, $objectname, $data)
    {
        $format      = $this->$varname;
        $replaceData = str_ireplace(array_keys($format), array_values($format), $data);

        $this->$objectname = $this->_slashes($replaceData);
    }
}
