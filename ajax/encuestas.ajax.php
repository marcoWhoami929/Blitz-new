<?php
session_start();


require_once "../controllers/encuestas.controller.php";
date_default_timezone_set('America/Mexico_City');

$action = (isset($_REQUEST['action']) && $_REQUEST['action'] != NULL) ? $_REQUEST['action'] : '';
if ($action == 'lista_encuestas') {

    include('../clases/encuestas.php');
    $database = new encuestas();
    //Recibir variables enviadas
    $busqueda = strip_tags($_REQUEST['busqueda']);
    $campoOrden = strip_tags($_REQUEST['campoOrden']);
    $orden = strip_tags($_REQUEST['orden']);
    $per_page = intval($_REQUEST['per_page']);
    $vista = strip_tags($_REQUEST['vista']);

    //Variables de paginación
    $page = (isset($_REQUEST['page']) && !empty($_REQUEST['page'])) ? $_REQUEST['page'] : 1;
    $adjacents  = 4; //espacio entre páginas después del número de adyacentes
    $offset = ($page - 1) * $per_page;

    $search = array("busqueda" => $busqueda, "campoOrden" => $campoOrden, "orden" => $orden, "per_page" => $per_page, "offset" => $offset);
    //consulta principal para recuperar los datos
    $datos = $database->getListaEncuestas($search);
    $countAll = $database->getCounter();
    $row = $countAll;

    if ($row > 0) {
        $numrows = $countAll;;
    } else {
        $numrows = 0;
    }
    $total_pages = ceil($numrows / $per_page);


    //Recorrer los datos recuperados

    if ($numrows > 0) {
?>

        <?php
        $finales = 0;
        foreach ($datos as $key => $row) {

            $ahora = date("Y-m-d H:i:s");
            $fecha_publicacion =  date("Y-m-d H:i:s", strtotime($row["fecha_publicacion"]));
            $fecha_expiracion =  date("Y-m-d H:i:s", strtotime($row["fecha_expiracion"]));

            if ($fecha_publicacion > $ahora) {
                $estatus = "Inicia en";
                $estado = "Sin Iniciar";
                $card_color = "card-red";
            } else {
                if ($ahora > $fecha_expiracion) {
                    $estatus = "";
                    $estado = "Finalizada";
                    $card_color = "card-green";
                } else {
                    if ($fecha_expiracion > $fecha_publicacion) {
                        $estatus = "Finaliza en";
                        $estado = "Iniciado";
                        $card_color = "card-color";
                    }
                }
            }

        ?>
            <div class="col-lg-4 col-md-4 col-sm-6" onclick="<?= "cargarNota('" . $row["codigo"] . "','" . $ahora . "','" . $row["fecha_publicacion"] . "','" . $row["fecha_expiracion"] . "')" ?>" style="cursor:pointer">
                <div class="card mb-3">
                    <div class="card-header <?= $card_color ?>">
                        <h4><?= $estado ?></h4>
                    </div>

                    <div class="row g-0">
                        <div class="col-md-4">
                            <img src="<?= APP_URL_ADMIN . "app/ajax/codes/" . $row["codigo"] . ".png" ?>" class="img-fluid rounded-start" alt="...">
                        </div>
                        <div class="col-md-8">

                            <div class="card-body">
                                <h5 class="card-title"><?= $row["codigo"] ?></h5>
                                <p class="card-text"><?= $row["titulo_nota"] ?></p>
                                <p class="card-text"><small class="text-muted"><?= $row["fecha_expiracion"] ?></small></p>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer card-color">
                        <h4><?= $estatus ?></h4>
                        <div class="countdown" id="countdown<?= $row['id_nota']; ?>"><?= '<script>countDown("' . $row['fecha_publicacion'] . '","' . $row['fecha_expiracion'] . '","' . $row['id_nota'] . '","' . $row['estatus'] . '")</script>'; ?>

                        </div>
                    </div>

                </div>
            </div>
        <?php
            $finales++;
        }
        ?>

        <div class="clearfix">
            <?php
            $inicios = $offset + 1;
            $finales += $inicios - 1;
            echo '<div class="hint-text">Mostrando ' . $inicios . ' al ' . $finales . ' de ' . $numrows . ' registros</div>';


            include '../clases/pagination.php'; //include pagination class
            $pagination = new Pagination($page, $total_pages, $adjacents);
            echo $pagination->paginate($vista);

            ?>
        </div>
<?php
    } else {
        echo '<div class="col-md-12 col-lg-12 col-sm-12 grid-margin stretch-card">
                <div class="card bg-info">
                    <div class="card-body">
                        <div class="content-wrapper d-flex align-items-center text-center error-page bg-info">
                            <div class="row flex-grow">
                                <div class="col-lg-7 mx-auto text-white">
                                    <div class="row align-items-center d-flex flex-row">
                                        <div class="col-lg-6 text-lg-right pr-lg-4">
                                            
                                            <p class="has-text-centered has-text-white pb-3">
                                                <i class="fas fa-sad-tear fa-10x" style="color:#ffffff"></i>
                                            </p>
                                        </div>
                                        <div class="col-lg-6 error-page-divider text-lg-left pl-lg-4">
                                            <h2>Upps!</h2>
                                            <h3 class="font-weight-light">Aún no hay notas creadas.</h3>
                                        </div>
                                    </div>
                                    <div class="row mt-5">
                                        <div class="col-12 text-center mt-xl-2">
                                           
                                        </div>
                                    </div>
                                    <div class="row mt-5">
                                        <div class="col-12 mt-xl-2">
                                            <p class="text-white font-weight-medium text-center"></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>';
    }
}
