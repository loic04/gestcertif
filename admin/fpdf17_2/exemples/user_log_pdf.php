<?php
require('../fpdf.php');
class PDF_MySQL_Table extends FPDF
{
var $ProcessingTable=false;
var $aCols=array();
var $TableX;
var $HeaderColor;
var $RowColors;
var $ColorIndex;

function Header()
{
    //Imprime l'en-tête du tableau si nécessaire
    if($this->ProcessingTable)
        $this->TableHeader();
}

function TableHeader()
{
    $this->SetFont('Arial','B',12);
    $this->SetX($this->TableX);
    $fill=!empty($this->HeaderColor);
    if($fill)
        $this->SetFillColor($this->HeaderColor[0],$this->HeaderColor[1],$this->HeaderColor[2]);
    foreach($this->aCols as $col)
        $this->Cell($col['w'],6,$col['c'],1,0,'C',$fill);
    $this->Ln();
}

function Row($data)
{
    $this->SetX($this->TableX);
    $ci=$this->ColorIndex;
    $fill=!empty($this->RowColors[$ci]);
    if($fill)
        $this->SetFillColor($this->RowColors[$ci][0],$this->RowColors[$ci][1],$this->RowColors[$ci][2]);
    foreach($this->aCols as $col)
        $this->Cell($col['w'],5,$data[$col['f']],1,0,$col['a'],$fill);
    $this->Ln();
    $this->ColorIndex=1-$ci;
}

function CalcWidths($width,$align)
{
    //Calcule les largeurs des colonnes
    $TableWidth=0;
    foreach($this->aCols as $i=>$col)
    {
        $w=$col['w'];
        if($w==-1)
            $w=$width/count($this->aCols);
        elseif(substr($w,-1)=='%')
            $w=$w/100*$width;
        $this->aCols[$i]['w']=$w;
        $TableWidth+=$w;
    }
    //Calcule l'abscisse du tableau
    if($align=='C')
        $this->TableX=max(($this->w-$TableWidth)/2,0);
    elseif($align=='R')
        $this->TableX=max($this->w-$this->rMargin-$TableWidth,0);
    else
        $this->TableX=$this->lMargin;
}

function AddCol($field=-1,$width=-1,$caption='',$align='L')
{
    //Ajoute une colonne au tableau
    if($field==-1)
        $field=count($this->aCols);
    $this->aCols[]=array('f'=>$field,'c'=>$caption,'w'=>$width,'a'=>$align);
}

function Table($query,$prop=array())
{
    //Exécute la requête
    $res=mysql_query($query) or die('Erreur: '.mysql_error()."<BR>Requête: $query");
    //Ajoute toutes les colonnes si aucune n'a été définie
    if(count($this->aCols)==0)
    {
        $nb=mysql_num_fields($res);
        for($i=0;$i<$nb;$i++)
            $this->AddCol();
    }
    //Détermine les noms des colonnes si non spécifiés
    foreach($this->aCols as $i=>$col)
    {
        if($col['c']=='')
        {
            if(is_string($col['f']))
                $this->aCols[$i]['c']=ucfirst($col['f']);
            else
                $this->aCols[$i]['c']=ucfirst(mysql_field_name($res,$col['f']));
        }
    }
    //Traite les propriétés
    if(!isset($prop['width']))
        $prop['width']=0;
    if($prop['width']==0)
        $prop['width']=$this->w-$this->lMargin-$this->rMargin;
    if(!isset($prop['align']))
        $prop['align']='C';
    if(!isset($prop['padding']))
        $prop['padding']=$this->cMargin;
    $cMargin=$this->cMargin;
    $this->cMargin=$prop['padding'];
    if(!isset($prop['HeaderColor']))
        $prop['HeaderColor']=array();
    $this->HeaderColor=$prop['HeaderColor'];
    if(!isset($prop['color1']))
        $prop['color1']=array();
    if(!isset($prop['color2']))
        $prop['color2']=array();
    $this->RowColors=array($prop['color1'],$prop['color2']);
    //Calcule les largeurs des colonnes
    $this->CalcWidths($prop['width'],$prop['align']);
    //Imprime l'en-tête
    $this->TableHeader();
    //Imprime les lignes
    $this->SetFont('Arial','',11);
    $this->ColorIndex=0;
    $this->ProcessingTable=true;
    while($row=mysql_fetch_array($res))
        $this->Row($row);
    $this->ProcessingTable=false;
    $this->cMargin=$cMargin;
    $this->aCols=array();
}
}
define('FPDF_FONTPATH','font/');
class PDF extends PDF_MySQL_Table 
{

//en-tête de page
function Header()
{
    //Titre et image
	$this->Image('../../images/logo1.png',150,3,30);
	$this->Image('../../images/dkbs.png',32,3,30);
	$this->Ln(25);
    $this->SetFont('Times','B',16);
    $this->Cell(0,6,'FICHIER LOG DE CONNEXION',0,1,'C');
    $this->Ln(10);
    //Imprime l'en-tête du tableau si nécessaire
    parent::Header();
}

//Pied de page
function Footer()
{
    //Positionnement à 1,5 cm du bas
    $this->SetY(-15);
    //Police Arial italique 8
    $this->SetFont('Arial','I',8);
    //Numéro de page
    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}

}

//Connexion à la base
mysql_connect('localhost','root','');
mysql_select_db('gestcertdkb');
$pdf=new PDF();
$pdf->Open();
$pdf->AddPage();
$pdf->AliasNbPages();

//tableau : définit 6 colonnes
$pdf->AddCol('username',30,'Utilisateur');
$pdf->AddCol('login_date',60,'Date connexion');
$pdf->AddCol('logout_date',60,'Date deconnexion');
$prop=array('HeaderColor'=>array(1,254,248),
            'color1'=>array(255,255,255),
            'color2'=>array(255,255,255),
            'padding'=>1);
$pdf->Table('SELECT * FROM user_log order by login_date DESC',$prop);
$pdf->Output();
?> 