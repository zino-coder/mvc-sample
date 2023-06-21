<div class="col-12">
    <form action="/task/store" method="post">
        <div class="card">
            <div class="card-header">
                <h2 class="card-title float-start">Create new Task</h2>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <label for="title" class="form-label">Task Title</label>
                    <input type="text" name="title" class="form-control" id="title">
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Task Description</label>
                    <textarea class="form-control" name="description" id="description" rows="3"></textarea>
                </div>
                <label for="status" class="form-label">Status</label>
                <select class="form-select" name="status" id="status">
                    <?php foreach ($taskStatus as $status): ?>
                        <option class="text-<?php echo $this->statusColor[$status->id] ?>" value="<?php echo $status->id ?>"><?php echo $status->name ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Save</button>
                <button type="button" class="btn btn-secondary" onclick="return window.history.back()">Back</button>
            </div>
        </div>
    </form>
</div>