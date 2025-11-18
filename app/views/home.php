<?php
declare(strict_types=1);
?>
<section class="row align-items-center g-5 mb-5">
    <div class="col-md-6">
        <span class="badge text-bg-primary mb-3">Transition-ready Infrastructure</span>
        <h1 class="display-5 fw-bold mb-4">Fund EQ unbundles fund management, technology, promotion, and AFSL governance.</h1>
        <p class="lead">Modular entities deliver segregation of duties while Supabase-backed data rooms keep every decision auditable. Launch calmly knowing insurance, directorships, and representation frameworks are already mapped.</p>
        <div class="d-flex gap-3">
            <a class="btn btn-primary btn-lg" href="/?page=tasks">View Transition Tasks</a>
            <a class="btn btn-outline-secondary btn-lg" href="/?page=team">Meet the Team</a>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card shadow-lg">
            <div class="card-header bg-dark text-white">Entity Separation Blueprint</div>
            <div class="card-body">
                <ul class="list-group list-group-flush">
                    <?php foreach ($pillars as $title => $copy): ?>
                        <li class="list-group-item">
                            <h6 class="fw-bold mb-1"><?= htmlspecialchars($title) ?></h6>
                            <p class="mb-0 text-muted"><?= htmlspecialchars($copy) ?></p>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    </div>
</section>
<section class="row g-4">
    <div class="col-md-4">
        <div class="card h-100">
            <div class="card-body">
                <h5 class="card-title">Directorships & Representation</h5>
                <p class="card-text">Clear mandate for each board with defined information rights, shared via Supabase Policies.</p>
                <ul class="mb-0">
                    <li>Responsible entity + AFSL board</li>
                    <li>Investment manager board</li>
                    <li>Technology & promotion advisory council</li>
                </ul>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card h-100">
            <div class="card-body">
                <h5 class="card-title">Insurance Program</h5>
                <p class="card-text">Professional indemnity, cyber, and D&O coverage with scheduled renewal checklist.</p>
                <p class="mb-0 text-muted">Proposed start date lives in Supabase alongside vendor evidence.</p>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card h-100">
            <div class="card-body">
                <h5 class="card-title">Reporting Fabric</h5>
                <p class="card-text">Bootstrap-powered console surfacing CRM inflows, marketing approvals, and AFSL risk items.</p>
                <p class="mb-0 text-muted">Every data point comes from the same Supabase project for single source of truth.</p>
            </div>
        </div>
    </div>
</section>
