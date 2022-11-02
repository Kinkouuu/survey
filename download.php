

<?php
include 'db.php';
if (isset($_POST['download'])){
	$query = 'SELECT * FROM "drawnFeature" ORDER BY "id" ASC';
	if (!$result = pg_query($dbconn, $query)) {
    exit(pg_result_error($dbconn));		
	}
	$data = array();
	if (pg_num_rows($result) > 0) {
    	while ($row = pg_fetch_assoc($result)) {
        	$data[] = $row;
    	}
	}
	header('Content-Type: text/csv; charset=utf-8');
	header('Content-Disposition: attachment; filename=data.csv');
	$output = fopen('php://output', 'w');
	fputcsv($output, array('type', 'name', 'geom','id'));
	if (count($data) > 0) {
    	foreach ($data as $row) {
        	fputcsv($output, $row);
    	}
	}
}
?>