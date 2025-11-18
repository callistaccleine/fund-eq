<?php
declare(strict_types=1);
?>
<section class="section-block text-center">
    <div class="mb-4">
        <span class="badge text-bg-secondary mb-2">Leadership</span>
        <h2 class="fw-bold">Directors & Responsible Persons</h2>
        <p class="text-muted mb-0">Cross-entity representation ensures each mandate delivers without conflicts.</p>
    </div>
    <div class="row g-4">
        <?php foreach ($team as $member): ?>
            <div class="col-sm-6 col-lg-3">
                <div class="card h-100 text-center shadow-sm border-0">
                    <div class="card-body p-4">
                        <h5 class="card-title mb-1"><?= htmlspecialchars($member['name']) ?></h5>
                        <p class="text-primary small text-uppercase fw-semibold mb-3"><?= htmlspecialchars($member['role']) ?></p>
                        <p class="card-text small text-muted"><?= htmlspecialchars($member['bio']) ?></p>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</section>
<section class="section-block pt-0">
    <div class="row g-4">
        <div class="col-lg-6">
            <div class="card h-100 border-0 shadow-sm">
                <div class="card-body p-4">
                    <h5 class="card-title">Governance stack</h5>
                    <ul class="mb-0 text-body-secondary">
                        <li>Quarterly multi-entity board sessions with unified agendas.</li>
                        <li>Directorship registers sync to Supabase for regulator-ready access.</li>
                        <li>Delegations of authority digitised with Bootstrap workflows.</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card h-100 border-0 shadow-sm">
                <div class="card-body p-4">
                    <h5 class="card-title">Representation coverage</h5>
                    <p class="mb-3 text-body-secondary">Dedicated spokespeople per entity keep responsibilities traceable:</p>
                    <dl class="row mb-0 small text-body-secondary">
                        <dt class="col-sm-4">Fund management</dt>
                        <dd class="col-sm-8">CIO and Responsible Manager for investment affairs.</dd>
                        <dt class="col-sm-4">Technology</dt>
                        <dd class="col-sm-8">CTO and security officer for all platform communications.</dd>
                        <dt class="col-sm-4">Promotion</dt>
                        <dd class="col-sm-8">Head of Promotion supported by compliance counsel.</dd>
                        <dt class="col-sm-4">AFSL</dt>
                        <dd class="col-sm-8">Independent chair plus board committee for regulator dialogue.</dd>
                    </dl>
                </div>
            </div>
        </div>
    </div>
</section>
