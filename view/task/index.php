<div class="col-12">
    <?php if (isset($_SESSION['success'])) : ?>
        <div class="alert alert-success"><?php echo $_SESSION['success'] ?></div>
    <?php unset($_SESSION['success']);
    endif; ?>
    <div class="card">
        <div class="card-header">
            <h2 class="card-title float-start">List Task</h2>
            <a href="/task/create" class="btn btn-outline-success float-end">
                <i class="fa-solid fa-circle-plus"></i>
            </a>
        </div>
        <div class="card-body">
            <?php if ($tasks) : ?>
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
                        <?php $i = 0;
                        foreach ($tasks as $task) : ?>
                            <tr>
                                <th scope="row"><?php echo $task->row_id ?></th>
                                <td><?php echo $task->title; ?></td>
                                <td><?php echo $task->description ?></td>
                                <td><?php echo $task->statusName ?></td>
                                <td>
                                    <a href="#" class="btn btn-outline-success">
                                        <i class="fa-solid fa-eye"></i>
                                    </a>
                                    <a href="<?= '/task/edit/' . $task->id ?>" class="btn btn-outline-primary">
                                        <i class="fa-solid fa-pen"></i>
                                    </a>
                                    <a href="<?= '/task/delete/' . $task->id ?>" class="btn btn-outline-danger btn-delete" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                        <i class="fa-solid fa-trash"></i>
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php else : ?>
                <div class="alert alert-danger">Không có dữ liệu</div>
            <?php endif; ?>
        </div>
        <div class="card-footer">
            <nav aria-label="Page navigation">
                <ul class="pagination float-end">
                    <?php if ($page != 1 || !isset($page)) : ?>
                        <li class="page-item">
                            <a class="page-link" href="<?= '/task/index/' . $page - 1 ?>" aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                            </a>
                        </li>
                    <?php endif; ?>
                    <?php for ($i = 1; $i <= $lastPage; $i++) : ?>
                        <li class="page-item <?= $page == $i ? 'active' : '' ?>"><a class="page-link" href="<?= '/task/index/' . $i ?>"><?= $i ?></a></li>
                    <?php endfor; ?>
                    <?php if ($page != $lastPage) : ?>
                        <li class="page-item">
                            <button type="button" class="page-link" href="<?= '/task/index/' . $page + 1 ?>" aria-label="Next">
                                <span aria-hidden="true">&raquo;</span>
                            </button>
                        </li>
                    <?php endif; ?>
                </ul>
            </nav>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Xoá</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Bạn có chắc chắn muốn xoá không?
            </div>
            <div class="modal-footer">
                <form action="" method="post" id="delete-form">
                    <button type="submit" class="btn btn-primary">Có</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">!Có</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function () {
        $('.btn-delete').click(function() {
            const href = $(this).attr('href');
            $('#delete-form').attr('action', href);
        })
    });
</script>