<?php
declare(strict_types=1);
?>
<section class="section-block">
    <div class="d-flex flex-column flex-lg-row justify-content-between gap-3 mb-4">
        <div>
            <span class="badge text-bg-success-subtle text-success mb-2">Supabase-backed</span>
            <h2 class="fw-bold mb-2">Transition Checklist</h2>
            <p class="text-body-secondary mb-0">Track insurance, technology enablement, AFSL obligations, and promotional readiness in one responsive CRUD workspace.</p>
        </div>
        <a class="btn btn-outline-primary align-self-start" href="/?page=tasks">Refresh tasks</a>
    </div>
    <?php if (!empty($message)): ?>
        <div class="alert alert-<?= htmlspecialchars($messageStatus ?? 'success') ?>"><?= htmlspecialchars($message) ?></div>
    <?php endif; ?>
    <div class="row g-4">
        <div class="col-lg-4">
            <div class="card h-100 shadow-sm">
                <div class="card-header bg-white">
                    <span class="fw-semibold">Create task</span>
                </div>
                <div class="card-body p-4">
                    <form method="post">
                        <input type="hidden" name="action" value="create">
                        <div class="mb-3">
                            <label class="form-label">Title</label>
                            <input class="form-control" name="title" placeholder="Insurance binders executed" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Owner</label>
                            <input class="form-control" name="owner" placeholder="Noah Everett" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Status</label>
                            <select class="form-select" name="status">
                                <option value="Planned">Planned</option>
                                <option value="In Progress">In progress</option>
                                <option value="Complete">Complete</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Proposed start date</label>
                            <input class="form-control" type="date" name="start_date">
                        </div>
                        <button class="btn btn-primary w-100" type="submit">Create</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-lg-8">
            <div class="card h-100 shadow-sm">
                <div class="card-header bg-white d-flex flex-column flex-sm-row justify-content-between align-items-sm-center">
                    <span class="fw-semibold">Tasks</span>
                    <span class="text-muted small">Full CRUD via Supabase REST</span>
                </div>
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0">
                        <thead class="table-light">
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Owner</th>
                            <th>Status</th>
                            <th>Start Date</th>
                            <th class="text-end">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php if (!empty($tasks)): ?>
                            <?php foreach ($tasks as $task): ?>
                                <tr>
                                    <td class="fw-semibold"><?= htmlspecialchars((string) ($task['id'] ?? '')) ?></td>
                                    <td><?= htmlspecialchars($task['title'] ?? '') ?></td>
                                    <td><?= htmlspecialchars($task['owner'] ?? '') ?></td>
                                    <td><span class="badge bg-secondary-subtle text-secondary"><?= htmlspecialchars($task['status'] ?? 'Planned') ?></span></td>
                                    <td><?= htmlspecialchars($task['start_date'] ?? '—') ?></td>
                                    <td class="text-end">
                                        <button class="btn btn-sm btn-outline-primary me-2"
                                                data-bs-toggle="modal"
                                                data-bs-target="#editModal"
                                                data-id="<?= htmlspecialchars((string) ($task['id'] ?? '')) ?>"
                                                data-title="<?= htmlspecialchars($task['title'] ?? '') ?>"
                                                data-owner="<?= htmlspecialchars($task['owner'] ?? '') ?>"
                                                data-status="<?= htmlspecialchars($task['status'] ?? '') ?>"
                                                data-date="<?= htmlspecialchars($task['start_date'] ?? '') ?>">
                                            Edit
                                        </button>
                                        <form method="post" class="d-inline">
                                            <input type="hidden" name="action" value="delete">
                                            <input type="hidden" name="task_id" value="<?= htmlspecialchars((string) ($task['id'] ?? '')) ?>">
                                            <button class="btn btn-sm btn-outline-danger" type="submit">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="6" class="text-center text-muted py-4">No tasks yet. Create the first readiness item.</td>
                            </tr>
                        <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Edit Modal -->
<div class="modal fade" id="editModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Task</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="post">
                <input type="hidden" name="action" value="update">
                <input type="hidden" name="task_id" id="edit-task-id">
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Title</label>
                        <input class="form-control" id="edit-title" name="title" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Owner</label>
                        <input class="form-control" id="edit-owner" name="owner" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Status</label>
                        <select class="form-select" id="edit-status" name="status">
                            <option value="Planned">Planned</option>
                            <option value="In Progress">In progress</option>
                            <option value="Complete">Complete</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Proposed start date</label>
                        <input class="form-control" id="edit-date" type="date" name="start_date">
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Cancel</button>
                    <button class="btn btn-primary" type="submit">Update Task</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', () => {
    const editModal = document.getElementById('editModal');
    editModal?.addEventListener('show.bs.modal', event => {
        const button = event.relatedTarget;
        if (!button) {
            return;
        }
        document.getElementById('edit-task-id').value = button.getAttribute('data-id');
        document.getElementById('edit-title').value = button.getAttribute('data-title');
        document.getElementById('edit-owner').value = button.getAttribute('data-owner');
        document.getElementById('edit-status').value = button.getAttribute('data-status');
        document.getElementById('edit-date').value = button.getAttribute('data-date');
    });
});
</script>
