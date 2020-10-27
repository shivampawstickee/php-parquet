<?php
namespace jocoon\parquet\data\concrete;

use jocoon\parquet\data\DataType;
use jocoon\parquet\data\BasicDataTypeHandler;
use jocoon\parquet\data\BasicPrimitiveDataTypeHandler;

use jocoon\parquet\format\Type;
use jocoon\parquet\format\ConvertedType;

class Int64DataTypeHandler extends BasicPrimitiveDataTypeHandler
{
  /**
   */
  public function __construct()
  {
    $this->phpType = 'integer';
    parent::__construct(DataType::Int64, Type::INT64);
  }

  /**
   * @inheritDoc
   */
  protected function readSingle(
    \PhpBinaryReader\BinaryReader $reader,
    \jocoon\parquet\format\SchemaElement $tse,
    int $length
  ) {
    return $reader->readInt64();
  }

  /**
   * @inheritDoc
   */
  protected function WriteOne(\Nelexa\Buffer\Buffer $writer, $value): void
  {
    $writer->insertLong($value);
  }
}
