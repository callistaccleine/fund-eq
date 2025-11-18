<?php
declare(strict_types=1);
?>
<section class="hero-panel rounded-4 px-4 px-lg-5 py-5 mb-6">
    <div class="row align-items-center g-5">
        <div class="col-lg-6">
            <span class="badge text-bg-primary-subtle text-primary-emphasis mb-3">Transition-ready infrastructure</span>
            <h1 class="display-5 fw-bold mb-4">Fund EQ orchestrates independent entities for management, technology, promotion, and AFSL governance.</h1>
            <p class="lead text-body-secondary mb-4">Each mandate sits within its own company, yet the investor experience remains seamless. Supabase-powered data rooms and Bootstrap UI kits ensure governance artefacts, insurance binders, and representation deeds are auditable from day one.</p>
            <div class="d-flex flex-column flex-sm-row gap-3">
                <a class="btn btn-primary btn-lg px-4" href="/?page=tasks">View transition tasks</a>
                <a class="btn btn-outline-light btn-lg px-4" href="/?page=team">Meet the directors</a>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card glass-card shadow-lg">
                <div class="card-header text-uppercase small fw-semibold text-muted">Entity Separation Blueprint</div>
                <div class="card-body p-4">
                    <div class="row g-3">
                        <?php foreach ($pillars as $title => $copy): ?>
                            <div class="col-sm-6">
                                <div class="feature-tile h-100">
                                    <h6 class="fw-bold mb-1"><?= htmlspecialchars($title) ?></h6>
                                    <p class="text-body-secondary small mb-0"><?= htmlspecialchars($copy) ?></p>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="row g-4">
    <div class="col-md-4">
        <div class="card h-100 p-4 align-items-start justify-content-between">
            <div>
                <h5 class="card-title">Directorships & Representation</h5>
                <p class="card-text text-body-secondary">Mandated boards with defined information rights and transparent reporting.</p>
            </div>
            <ul class="ps-3 mb-0 text-body-secondary small">
                <li>Responsible entity + AFSL board</li>
                <li>Investment manager board</li>
                <li>Technology & promotion advisory council</li>
            </ul>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card h-100 p-4">
            <h5 class="card-title">Insurance Programme</h5>
            <p class="card-text">Professional indemnity, cyber, and D&O cover with renewal reminders tied to Supabase tasks.</p>
            <p class="mb-0 text-body-secondary">Proposed commencement dates flow directly into the central checklist.</p>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card h-100 p-4">
            <h5 class="card-title">Reporting Fabric</h5>
            <p class="card-text">Responsive dashboards surface CRM inflows, marketing approvals, and AFSL risk activity.</p>
            <p class="mb-0 text-body-secondary">Every update references a single source of truth in Supabase.</p>
        </div>
    </div>
</section>
