<?php


abstract class BaseArticulosXPedido extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id_articulo_x_pedido;


	
	protected $id_articulo;


	
	protected $id_pedido;


	
	protected $cantidad;


	
	protected $created_at;


	
	protected $updated_at;

	
	protected $aArticulos;

	
	protected $aPedidos;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getIdArticuloXPedido()
	{

		return $this->id_articulo_x_pedido;
	}

	
	public function getIdArticulo()
	{

		return $this->id_articulo;
	}

	
	public function getIdPedido()
	{

		return $this->id_pedido;
	}

	
	public function getCantidad()
	{

		return $this->cantidad;
	}

	
	public function getCreatedAt($format = 'Y-m-d H:i:s')
	{

		if ($this->created_at === null || $this->created_at === '') {
			return null;
		} elseif (!is_int($this->created_at)) {
						$ts = strtotime($this->created_at);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [created_at] as date/time value: " . var_export($this->created_at, true));
			}
		} else {
			$ts = $this->created_at;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
	}

	
	public function getUpdatedAt($format = 'Y-m-d H:i:s')
	{

		if ($this->updated_at === null || $this->updated_at === '') {
			return null;
		} elseif (!is_int($this->updated_at)) {
						$ts = strtotime($this->updated_at);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [updated_at] as date/time value: " . var_export($this->updated_at, true));
			}
		} else {
			$ts = $this->updated_at;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
	}

	
	public function setIdArticuloXPedido($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->id_articulo_x_pedido !== $v) {
			$this->id_articulo_x_pedido = $v;
			$this->modifiedColumns[] = ArticulosXPedidoPeer::ID_ARTICULO_X_PEDIDO;
		}

	} 
	
	public function setIdArticulo($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->id_articulo !== $v) {
			$this->id_articulo = $v;
			$this->modifiedColumns[] = ArticulosXPedidoPeer::ID_ARTICULO;
		}

		if ($this->aArticulos !== null && $this->aArticulos->getIdArticulo() !== $v) {
			$this->aArticulos = null;
		}

	} 
	
	public function setIdPedido($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->id_pedido !== $v) {
			$this->id_pedido = $v;
			$this->modifiedColumns[] = ArticulosXPedidoPeer::ID_PEDIDO;
		}

		if ($this->aPedidos !== null && $this->aPedidos->getIdPedido() !== $v) {
			$this->aPedidos = null;
		}

	} 
	
	public function setCantidad($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->cantidad !== $v) {
			$this->cantidad = $v;
			$this->modifiedColumns[] = ArticulosXPedidoPeer::CANTIDAD;
		}

	} 
	
	public function setCreatedAt($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [created_at] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->created_at !== $ts) {
			$this->created_at = $ts;
			$this->modifiedColumns[] = ArticulosXPedidoPeer::CREATED_AT;
		}

	} 
	
	public function setUpdatedAt($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [updated_at] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->updated_at !== $ts) {
			$this->updated_at = $ts;
			$this->modifiedColumns[] = ArticulosXPedidoPeer::UPDATED_AT;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->id_articulo_x_pedido = $rs->getInt($startcol + 0);

			$this->id_articulo = $rs->getInt($startcol + 1);

			$this->id_pedido = $rs->getInt($startcol + 2);

			$this->cantidad = $rs->getInt($startcol + 3);

			$this->created_at = $rs->getTimestamp($startcol + 4, null);

			$this->updated_at = $rs->getTimestamp($startcol + 5, null);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 6; 
		} catch (Exception $e) {
			throw new PropelException("Error populating ArticulosXPedido object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(ArticulosXPedidoPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			ArticulosXPedidoPeer::doDelete($this, $con);
			$this->setDeleted(true);
			$con->commit();
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	}

	
	public function save($con = null)
	{
    if ($this->isNew() && !$this->isColumnModified(ArticulosXPedidoPeer::CREATED_AT))
    {
      $this->setCreatedAt(time());
    }

    if ($this->isModified() && !$this->isColumnModified(ArticulosXPedidoPeer::UPDATED_AT))
    {
      $this->setUpdatedAt(time());
    }

		if ($this->isDeleted()) {
			throw new PropelException("You cannot save an object that has been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(ArticulosXPedidoPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			$affectedRows = $this->doSave($con);
			$con->commit();
			return $affectedRows;
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	}

	
	protected function doSave($con)
	{
		$affectedRows = 0; 		if (!$this->alreadyInSave) {
			$this->alreadyInSave = true;


												
			if ($this->aArticulos !== null) {
				if ($this->aArticulos->isModified()) {
					$affectedRows += $this->aArticulos->save($con);
				}
				$this->setArticulos($this->aArticulos);
			}

			if ($this->aPedidos !== null) {
				if ($this->aPedidos->isModified()) {
					$affectedRows += $this->aPedidos->save($con);
				}
				$this->setPedidos($this->aPedidos);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = ArticulosXPedidoPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setIdArticuloXPedido($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += ArticulosXPedidoPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			$this->alreadyInSave = false;
		}
		return $affectedRows;
	} 
	
	protected $validationFailures = array();

	
	public function getValidationFailures()
	{
		return $this->validationFailures;
	}

	
	public function validate($columns = null)
	{
		$res = $this->doValidate($columns);
		if ($res === true) {
			$this->validationFailures = array();
			return true;
		} else {
			$this->validationFailures = $res;
			return false;
		}
	}

	
	protected function doValidate($columns = null)
	{
		if (!$this->alreadyInValidation) {
			$this->alreadyInValidation = true;
			$retval = null;

			$failureMap = array();


												
			if ($this->aArticulos !== null) {
				if (!$this->aArticulos->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aArticulos->getValidationFailures());
				}
			}

			if ($this->aPedidos !== null) {
				if (!$this->aPedidos->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aPedidos->getValidationFailures());
				}
			}


			if (($retval = ArticulosXPedidoPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = ArticulosXPedidoPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getIdArticuloXPedido();
				break;
			case 1:
				return $this->getIdArticulo();
				break;
			case 2:
				return $this->getIdPedido();
				break;
			case 3:
				return $this->getCantidad();
				break;
			case 4:
				return $this->getCreatedAt();
				break;
			case 5:
				return $this->getUpdatedAt();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = ArticulosXPedidoPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getIdArticuloXPedido(),
			$keys[1] => $this->getIdArticulo(),
			$keys[2] => $this->getIdPedido(),
			$keys[3] => $this->getCantidad(),
			$keys[4] => $this->getCreatedAt(),
			$keys[5] => $this->getUpdatedAt(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = ArticulosXPedidoPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setIdArticuloXPedido($value);
				break;
			case 1:
				$this->setIdArticulo($value);
				break;
			case 2:
				$this->setIdPedido($value);
				break;
			case 3:
				$this->setCantidad($value);
				break;
			case 4:
				$this->setCreatedAt($value);
				break;
			case 5:
				$this->setUpdatedAt($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = ArticulosXPedidoPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setIdArticuloXPedido($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setIdArticulo($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setIdPedido($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setCantidad($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setCreatedAt($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setUpdatedAt($arr[$keys[5]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(ArticulosXPedidoPeer::DATABASE_NAME);

		if ($this->isColumnModified(ArticulosXPedidoPeer::ID_ARTICULO_X_PEDIDO)) $criteria->add(ArticulosXPedidoPeer::ID_ARTICULO_X_PEDIDO, $this->id_articulo_x_pedido);
		if ($this->isColumnModified(ArticulosXPedidoPeer::ID_ARTICULO)) $criteria->add(ArticulosXPedidoPeer::ID_ARTICULO, $this->id_articulo);
		if ($this->isColumnModified(ArticulosXPedidoPeer::ID_PEDIDO)) $criteria->add(ArticulosXPedidoPeer::ID_PEDIDO, $this->id_pedido);
		if ($this->isColumnModified(ArticulosXPedidoPeer::CANTIDAD)) $criteria->add(ArticulosXPedidoPeer::CANTIDAD, $this->cantidad);
		if ($this->isColumnModified(ArticulosXPedidoPeer::CREATED_AT)) $criteria->add(ArticulosXPedidoPeer::CREATED_AT, $this->created_at);
		if ($this->isColumnModified(ArticulosXPedidoPeer::UPDATED_AT)) $criteria->add(ArticulosXPedidoPeer::UPDATED_AT, $this->updated_at);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(ArticulosXPedidoPeer::DATABASE_NAME);

		$criteria->add(ArticulosXPedidoPeer::ID_ARTICULO_X_PEDIDO, $this->id_articulo_x_pedido);

		return $criteria;
	}

	
	public function getPrimaryKey()
	{
		return $this->getIdArticuloXPedido();
	}

	
	public function setPrimaryKey($key)
	{
		$this->setIdArticuloXPedido($key);
	}

	
	public function copyInto($copyObj, $deepCopy = false)
	{

		$copyObj->setIdArticulo($this->id_articulo);

		$copyObj->setIdPedido($this->id_pedido);

		$copyObj->setCantidad($this->cantidad);

		$copyObj->setCreatedAt($this->created_at);

		$copyObj->setUpdatedAt($this->updated_at);


		$copyObj->setNew(true);

		$copyObj->setIdArticuloXPedido(NULL); 
	}

	
	public function copy($deepCopy = false)
	{
				$clazz = get_class($this);
		$copyObj = new $clazz();
		$this->copyInto($copyObj, $deepCopy);
		return $copyObj;
	}

	
	public function getPeer()
	{
		if (self::$peer === null) {
			self::$peer = new ArticulosXPedidoPeer();
		}
		return self::$peer;
	}

	
	public function setArticulos($v)
	{


		if ($v === null) {
			$this->setIdArticulo(NULL);
		} else {
			$this->setIdArticulo($v->getIdArticulo());
		}


		$this->aArticulos = $v;
	}


	
	public function getArticulos($con = null)
	{
		if ($this->aArticulos === null && ($this->id_articulo !== null)) {
						include_once 'lib/model/om/BaseArticulosPeer.php';

			$this->aArticulos = ArticulosPeer::retrieveByPK($this->id_articulo, $con);

			
		}
		return $this->aArticulos;
	}

	
	public function setPedidos($v)
	{


		if ($v === null) {
			$this->setIdPedido(NULL);
		} else {
			$this->setIdPedido($v->getIdPedido());
		}


		$this->aPedidos = $v;
	}


	
	public function getPedidos($con = null)
	{
		if ($this->aPedidos === null && ($this->id_pedido !== null)) {
						include_once 'lib/model/om/BasePedidosPeer.php';

			$this->aPedidos = PedidosPeer::retrieveByPK($this->id_pedido, $con);

			
		}
		return $this->aPedidos;
	}

} 