<?php
namespace jocoon\parquet\format;

/**
 * Autogenerated by Thrift Compiler (0.13.0)
 *
 * DO NOT EDIT UNLESS YOU ARE SURE THAT YOU KNOW WHAT YOU ARE DOING
 *  @generated
 */
use Thrift\Base\TBase;
use Thrift\Type\TType;
use Thrift\Type\TMessageType;
use Thrift\Exception\TException;
use Thrift\Exception\TProtocolException;
use Thrift\Protocol\TProtocol;
use Thrift\Protocol\TBinaryProtocolAccelerated;
use Thrift\Exception\TApplicationException;

/**
 * Timestamp logical type annotation
 * 
 * Allowed for physical types: INT64
 */
class TimestampType
{
    static public $isValidate = false;

    static public $_TSPEC = array(
        1 => array(
            'var' => 'isAdjustedToUTC',
            'isRequired' => true,
            'type' => TType::BOOL,
        ),
        2 => array(
            'var' => 'unit',
            'isRequired' => true,
            'type' => TType::STRUCT,
            'class' => '\jocoon\parquet\format\TimeUnit',
        ),
    );

    /**
     * @var bool
     */
    public $isAdjustedToUTC = null;
    /**
     * @var \jocoon\parquet\format\TimeUnit
     */
    public $unit = null;

    public function __construct($vals = null)
    {
        if (is_array($vals)) {
            if (isset($vals['isAdjustedToUTC'])) {
                $this->isAdjustedToUTC = $vals['isAdjustedToUTC'];
            }
            if (isset($vals['unit'])) {
                $this->unit = $vals['unit'];
            }
        }
    }

    public function getName()
    {
        return 'TimestampType';
    }


    public function read($input)
    {
        $xfer = 0;
        $fname = null;
        $ftype = 0;
        $fid = 0;
        $xfer += $input->readStructBegin($fname);
        while (true) {
            $xfer += $input->readFieldBegin($fname, $ftype, $fid);
            if ($ftype == TType::STOP) {
                break;
            }
            switch ($fid) {
                case 1:
                    if ($ftype == TType::BOOL) {
                        $xfer += $input->readBool($this->isAdjustedToUTC);
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                case 2:
                    if ($ftype == TType::STRUCT) {
                        $this->unit = new \jocoon\parquet\format\TimeUnit();
                        $xfer += $this->unit->read($input);
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                default:
                    $xfer += $input->skip($ftype);
                    break;
            }
            $xfer += $input->readFieldEnd();
        }
        $xfer += $input->readStructEnd();
        return $xfer;
    }

    public function write($output)
    {
        $xfer = 0;
        $xfer += $output->writeStructBegin('TimestampType');
        if ($this->isAdjustedToUTC !== null) {
            $xfer += $output->writeFieldBegin('isAdjustedToUTC', TType::BOOL, 1);
            $xfer += $output->writeBool($this->isAdjustedToUTC);
            $xfer += $output->writeFieldEnd();
        }
        if ($this->unit !== null) {
            if (!is_object($this->unit)) {
                throw new TProtocolException('Bad type in structure.', TProtocolException::INVALID_DATA);
            }
            $xfer += $output->writeFieldBegin('unit', TType::STRUCT, 2);
            $xfer += $this->unit->write($output);
            $xfer += $output->writeFieldEnd();
        }
        $xfer += $output->writeFieldStop();
        $xfer += $output->writeStructEnd();
        return $xfer;
    }
}
