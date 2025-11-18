<?php
declare(strict_types=1);
?>
<section class="mb-5">
    <div class="text-center mb-4">
        <span class="badge text-bg-secondary mb-2">Leadership</span>
        <h2 class="fw-bold">Directors & Responsible Persons</h2>
        <p class="text-muted mb-0">Cross-entity representation ensures each mandate delivers without conflicts.</p>
    </div>
    <div class="row g-4">
        <?php foreach ($team as $member): ?>
            <div class="col-md-3">
                <div class="card h-100 text-center shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title mb-1"><?= htmlspecialchars($member['name']) ?></h5>
                        <p class="text-primary small text-uppercase fw-semibold mb-3"><?= htmlspecialchars($member['role']) ?></p>
                        <p class="card-text small text-muted"><?= htmlspecialchars($member['bio']) ?></p>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</section>
<section>
    <div class="row g-4">
        <div class="col-md-6">
            <div class="card h-100">
                <div class="card-body">
                    <h5 class="card-title">Governance Stack</h5>
                    <ul class="mb-0">
                        <li>Quarterly multi-entity board sessions with unified agendas.</li>
                        <li>Directorship registers sync to Supabase for regulator-ready access.</li>
                        <li>Delegations of authority digitised with Bootstrap workflows.</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card h-100">
                <div class="card-body">
                    <h5 class="card-title">Representation Coverage</h5>
                    <p class="mb-2">Dedicated spokespeople per entity to keep responsibilities traceable:</p>
                    <dl class="row mb-0 small">
                        <dt class="col-sm-4">Fund Management</dt>
                        <dd class="col-sm-8">CIO + Responsible Manager for investment affairs.</dd>
                        <dt class="col-sm-4">Technology</dt>
                        <dd class="col-sm-8">CTO and security officer for all platform comms.</dd>
                        <dt class="col-sm-4">Promotion</dt>
                        <dd class="col-sm-8">Head of Promotion supported by compliance counsel.</dd>
                        <dt class="col-sm-4">AFSL</dt>
                        <dd class="col-sm-8">Independent chair + board committee for regulatory contact.</dd>
                    </dl>
                </div>
            </div>
        </div>
    </div>
</section>
