    <?php if(isset($_SESSION['user_id'])): ?>
    <footer style="background: var(--bg-color); border-top: 1px solid var(--border-color); padding: 2rem 0; margin-top: 3rem;">
        <div class="container" style="text-align: center; color: var(--text-secondary);">
            <p style="margin-bottom: 0.5rem;">
                <strong style="color: var(--primary-color);">Universiti Teknologi Malaysia</strong>
            </p>
            <p style="font-size: 0.875rem;">
                Facility Booking System © <?= date('Y') ?> UTM. All rights reserved.
            </p>
        </div>
    </footer>
    <?php endif; ?>
</body>
</html>
