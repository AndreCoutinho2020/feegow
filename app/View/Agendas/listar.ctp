<div class="card">
    <div class="card-header">Listagem dos agendamentos</div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">specialty_id</th>
                        <th scope="col">professional_id</th>
                        <th scope="col">name</th>
                        <th scope="col">cpf</th>
                        <th scope="col">source_id</th>
                        <th scope="col">date_time</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($busca as $b) { ?>
                        <tr>
                            <td><?php echo $b['Agenda']['specialty_id']; ?></td>
                            <td><?php echo $b['Agenda']['professional_id']; ?></td>
                            <td><?php echo $b['Agenda']['name']; ?></td>
                            <td><?php echo $b['Agenda']['cpf']; ?></td>
                            <td><?php echo $b['Agenda']['source_id']; ?></td>
                            <td><?php echo $this->App->datahoraPT($b['Agenda']['date_time']); ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>