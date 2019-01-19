<?php // content="text/plain; charset=utf-8"
require_once ('../../jpgraph-4.2.5/src/jpgraph.php');
require_once ('../../jpgraph-4.2.5/src/jpgraph_line.php');

try
{
	include ("../../Modeles/Requete_parametre.php");
}
catch (Exception $e)
{
	die('Erreur : ' . $e->getMessage());
}

$arrayMois = array('1','2','3','4','5','6','7','8','9','10','11','12');

$datay = array();

$req = $bdd->query('SELECT COUNT(*) AS countConnexion FROM connexion GROUP BY MONTH(connexion.Date_connexion) ASC');

while ($donnees = $req->fetch())
{
	$datay[] = $donnees['countConnexion'];
}

$req->closeCursor();

// Setup the graph
$graph = new Graph(700,400);
$graph->SetScale("intlin",0,0,0,0);
$theme_class=new UniversalTheme;
$graph->SetTheme($theme_class);

$graph->SetBox(false);

$graph->title->Set("Nombre de connexions");
$graph->ygrid->Show(true);
$graph->xgrid->Show(false);
$graph->yaxis->HideZeroLabel();
$graph->ygrid->SetFill(true,'#FFFFFF@0.5','#FFFFFF@0.5');
$graph->SetBackgroundGradient('blue', '#55eeff', GRAD_HOR, BGRAD_PLOT);
$graph->xaxis->SetTickLabels($arrayMois);

// Create the line
$p1 = new LinePlot($datay);
$graph->Add($p1);

$p1->SetFillGradient('yellow','red');
$p1->SetStepStyle();
$p1->SetColor('#808000');

// Output line
$graph->Stroke();

?>