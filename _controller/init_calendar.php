<?php

$where = "";
$selectable = "";


if($_SESSION['tipo']==4){
    $where = "and cli_id_pessoa =". $_SESSION['id_pessoa'];
}

if($_SESSION['tipo']==3){
    $where = "and atd_id_medico =". $_SESSION['id'];
}

if($_SESSION['tipo'] != 4 ){
    $selectable = 'true';
}else{
    $selectable = 'false';
}


$query = "SELECT atd_id_atendimento as id,
                 atd_ds_atendimento as title,
                 atd_inicio_atendimento as dt_start,
                 atd_fim_atendimento as dt_end,
                 ani_nm_animal as animal,
                 ani_id_animal as id_animal,
                 pes_nm_pessoa as dono,
                 atd_obs_atendimento as obs,
                 (SELECT pes_nm_pessoa 
                  FROM pes_pessoa 
                  inner join usr_usuario on usr_id_pessoa = pes_id_pessoa
                  WHERE atd_id_medico = usr_id_usuario) as medico,
                  atd_id_medico as id_medico
          FROM atd_atendimento
          INNER JOIN ani_animal on atd_id_animal = ani_id_animal
          INNER JOIN cli_cliente on cli_id_cliente = ani_id_cliente
          INNER JOIN pes_pessoa on cli_id_pessoa = pes_id_pessoa
          WHERE atd_st_atendimento = 1 ";

//echo $query.$where;

$res = mysqli_query(connect(),$query.$where);
?>

<script>
    $(document).ready(function() {

            $('#calendar').fullCalendar({
                header: {
                    left: 'prev,next ',
                    center: 'title',
                    right: 'month,agendaWeek,agendaDay today'
                },
                defaultDate: '2018-05-21',
                navLinks: true,
                editable: false,
                eventLimit: true,
                events: [
                    <?php while($dados = mysqli_fetch_array($res)){ ?>
                    {
                        id:       '<?php echo $dados['id'];?>',
                        title:    '<?php echo $dados['title'];?>',
                        start:    '<?php echo $dados['dt_start'];?>',
                        end:      '<?php echo $dados['dt_end'];?>',
                        name:     '<?php echo $dados['dono'];?>',
                        animal:   '<?php echo $dados['animal'];?>',
                        medico:   '<?php echo $dados['medico'];?>',
                        <?php $string = preg_replace('/\s/',' ',$dados['obs']);?>
                        obs:      '<?php echo $string?>',
                        id_animal:'<?php echo $dados['id_animal'];?>',
                        id_medico:'<?php echo $dados['id_medico'];?>',

                    },

                    <?php } ?>
                ],
                eventClick: function(calEvent, jsEvent, view) {

                    $('#modalAgenda .modal-title').html('Agendamento: '+calEvent.title);

                    $('#modalAgenda .modal-body #body_modal #animal').text(calEvent.animal);
                    $('#modalAgenda .modal-body #body_modal #dono').text(calEvent.name);
                    $('#modalAgenda .modal-body #body_modal #medico').text(calEvent.medico);
                    $('#modalAgenda .modal-body #body_modal #start').text(calEvent.start.format('HH:mm'));
                    $('#modalAgenda .modal-body #body_modal #obs').text(calEvent.obs);

                    $('#form-editar #id').val(calEvent.id);
                    $('#form-editar #descricao').val(calEvent.title);
                    $('#form-editar #animal').val(calEvent.id_animal);
                    $('#form-editar #dono').val(calEvent.id_dono);
                    $('#form-editar #medico').val(calEvent.id_medico);
                    $('#form-editar #start').val(calEvent.start.format('DD/MM/YYYY HH:mm:ss'));
                    $('#form-editar #end').val(calEvent.end.format('DD/MM/YYYY HH:mm:ss'));
                    $('#form-editar #observacao').val(calEvent.obs);


                    $('#modalAgenda .btn_excluir').attr('id',calEvent.id);
                    $('#modalAgenda .btn_realizar').attr('id',calEvent.id);
                    $('#modalAgenda').modal('show');

                },

                selectable:<?=$selectable?>,
                selectHelper:true,
                select:function(start,end){

                    $('#modalCadastrar #start').val(moment(start).format('DD/MM/YYYY HH:mm:ss'));
                    $('#modalCadastrar #end').val(moment(end).format('DD/MM/YYYY HH:mm:ss'));
                    $('#modalCadastrar').modal('show');
                },

            });
    });
</script>