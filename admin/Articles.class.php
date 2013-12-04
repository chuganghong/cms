<?php
/**
 *cms20131119项目
 *@description 文章操作类，增加文章，更新文章
 *@filename Articles.class.php
 *@author cg
 *@version 1.0
 *@date 2013/12/03 23:23
 */
class Articles extends Common
{
	private $tableName = 'cms_passage';
	private $tableName2 = 'cms_pcontent';
	
	public function __construct()
	{
		parent::__construct();
	}
	
	/**
	 *增加文章标题（除内容外）
	 *@param array $param 存储文章数据的数组
	 *@return mixed $id 插入文章的ID或false
	 */
	public function addPTitle($param)
	{
		$ptitle_zh = $params['ptitle_zh'];
		$ptitle_en = $params['ptitle_en'];
		$paddtime = $params['paddtime'];
		$cid = $params['cid'];
		$vip = $params['vip'];
		$pverify = $params['pverify'];
		$precycle = $params['precycle'];
		$psugesstion = $params['psugesstion'];
		
		$sql = "INSET INTO " . $this->tableName;
		$sql .= " (ptitle_zh,ptitle_en,paddtime,cid,vip,pverify,precycle,psugesstion) ";
		$sql .= "VALUES ";
		$sql .= "('$ptitle_zh','$ptitle_en',$paddtime,$cid,$vip,$pverify,$precycle,'$psugesstion')";
		
		$res = $this->db->query($sql);
		if($this->db->getAffectedRows())
		{
			$id = $this->db->getInsertId();
		}
		else
		{
			$id = false;
		}
		return $id;		
	}
	
	/**
	 *增加文章内容
	 *@param integer $id 文章ID
	 *@param array $param 存储文章的数据的数组
	 */
	public function addPContent($param,$pid)
	{
		$summary_zh = $param['summary_zh'];
		$summary_en = $param['summary_en'];
		$content_zh = $param['content_zh'];
		$content_en = $param['content_en'];
		
		$sql = "INSERT INTO " . $this->tableName2;
		$sql .= " (pid,summary_zh,summary_en,content_zh,content_en) ";
		$sql .= "VALUES ";
		$sql .= "($pid,'$summary_zh','$summary_en','$content_zh','$content_en')";
		
		$res = $this->db->query($sql);
		if($this->db->getAffectedRows())
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	
	/**
	 *增加文章
	 *@param array $param 存储文章数据的数组
	 *@return boolean $res true--success/false--failure
	 */
	public function addPassage($param)
	{
		$id = $this->addPTitle($param);
		if($id)
		{
			$res = $this->addPContent($param,$pid);						
		}
		else
		{
			$res = false;
		}
		return $res;
	}
	
	/**
	 *更新文章内容
	 *@param array $param存储文章数据的数组
	 *@param integer $id 要更新的文章的ID
	 *@return boolean $res true--success/false--failure
	 */
	public function updatePassage($param,$id)
	{
	}
	
	/**
	 *更新文章内容（标题等）数据
	 *@param array $param 存储文章数据的数组
	 *@param integer $pid 要更新的文章的ID
	 *@return boolean $res true--success/false--failure
	 */
	public function updatePTitle($param,$pid)
	{
		$ptitle_zh = $params['ptitle_zh'];
		$ptitle_en = $params['ptitle_en'];
		$paddtime = $params['paddtime'];
		$cid = $params['cid'];
		$vip = $params['vip'];
		$pverify = $params['pverify'];
		$precycle = $params['precycle'];
		$psugesstion = $params['psugesstion'];
		
		$sql = "UPDATE " . $this->tableName;
		$sql .= " SET ";
		$sql .= "ptitle_zh = '$ptitle_zh',";
		$sql .= "ptitle_en = '$ptitle_en',";
		$sql .= "paddtime = $paddtime,";
		$sql .= "cid = cid,";
		$sql .= "vip = vip,";
		$sql .= "pverify = $pverify,";
		$sql .= "precycle = $precycle,";
		$sql .= "psugesstion = '$psugesstion' ";
		$sql .= "WHERE pid = $pid";
		
		$this->db->query($sql);
		if($this->db->getAffectedRows())
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	
	/**
	 *更新文章内容（content）等数据
	 *@param array $param 存储文章数据的数组
	 *@param integer $pid 文章ID
	 *@return boolean $res true--success/false--failure
	 */
	public function updatePcontent($param,$pid)
	{
		$summary_zh = $param['summary_zh'];
		$summary_en = $param['summary_en'];
		$content_zh = $param['content_zh'];
		$content_en = $param['content_en'];		
		
		$sql = "UPDATE " . $this->tableName2;
		$sql .= " SET ";
		$sql .= "summary_zh='summary_zh',";
		$sql .= "summary_en='summary_en',";
		$sql .= "content_zh='content_zh',";
		$sql .= "content_en='content_en' ";
		$sql .= "WHERE pid = $pid";
		
		$this->db->query($sql);
		if($this->db->getAffectedRows())
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	
	/**
	 *更新文章
	 *@param array $param 存储文章数据的数组
	 *@param integer $pid 文章ID
	 *@return boolean $res true--success/false--failure
	 */
	public function updatePassage($param,$pid)
	{
		$res = $this->updatePTitle($param,$pid);
		if($res)
		{
			$res = $this->updatePcontent($param,$pid);
		}
		else
		{
			$res = false;
		}
		return $res;
	}
		
}