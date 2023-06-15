<div class="col-12">
    <div class="card">
        <div class="card-header">
            <div class="card-title">List Task</div>
        </div>
        <div class="card-body">
            <?php if ($tasks): ?>
            <table class="table table-hover table-bordered">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Title</th>
                        <th scope="col">Description</th>
                        <th scope="col">Status</th>
                        <th style="width: 200px;">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 0; foreach ($tasks as $task) : ?>
                    <tr>
                        <th scope="row"><?php echo ++$i ?></th>
                        <td><?php echo $task->title; ?></td>
                        <td><?php echo $task->description ?></td>
                        <td><?php echo $task->statusName ?></td>
                        <td>
                            <a href="#" class="btn btn-outline-success">
                                <i class="fa-solid fa-eye"></i>
                            </a>
                            <a href="#" class="btn btn-outline-primary">
                                <i class="fa-solid fa-pen"></i>
                            </a>
                            <a href="#" class="btn btn-outline-danger">
                                <i class="fa-solid fa-trash"></i>
                            </a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <?php else: ?>
                <div class="alert alert-danger">Không có dữ liệu</div>
            <?php endif; ?>
        </div>
    </div>
</div>