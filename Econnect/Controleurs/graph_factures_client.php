<?php // content="text/plain; charset=utf-8"
require_once ('../jpgraph-4.2.5/src/jpgraph.php');
require_once ('../jpgraph-4.2.5/src/jpgraph_bar.php');

try
{
	$bdd = new PDO('mysql:host=localhost;dbname=econnect_v2;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
}
catch (Exception $e)
{
	die('Erreur : ' . $e->getMessage());
}

$arrayMois = array('1','2','3','4','5','6','7','8','9','10','11','12');

$datay = array();

$req = $bdd->query('SELECT facture.Prix FROM facture GROUP BY MONTH(facture.Date_facture) ASC');

while ($donnees = $req->fetch())
{
	$datay[] = $donnees['Prix'];
}

$req->closeCursor();

//$data1y=array(900,1100,1950,2100,2200);

// Create the graph. These two calls are always required
$graph = new Graph(700,400,'auto');
$graph->SetScale("textlin");

$theme_class=new UniversalTheme;
$graph->SetTheme($theme_class);

$graph->yaxis->SetTickPositions(array(0,25,50,75,100,125,150));
$graph->yaxis->title->Set("Prix en €");
$graph->SetBox(false);

$graph->ygrid->SetFill(false);
$graph->xaxis->SetTickLabels($arrayMois);
$graph->xaxis->title->Set("Mois de l'année");
$graph->yaxis->HideLine(false);
$graph->yaxis->HideTicks(false,false);

// Create the bar plots
$b1plot = new BarPlot($datay);

// ...and add it to the graPH
$graph->Add($b1plot);

$b1plot->SetColor("white");
$b1plot->SetFillColor("#cc1111");

$graph->title->Set("Prix des factures des 12 derniers mois");

// Display the graph
$graph->Stroke();
?>