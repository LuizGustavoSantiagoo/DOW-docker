<?php
include '../partials/header.html';
include '../actions/connect.php';

$sql = "SELECT * FROM users";
$users = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);

?>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Manrope:wght@400;600;700&display=swap');

    :root {
        --bg-1: #f8fbff;
        --bg-2: #eef5ff;
        --card: #ffffff;
        --text: #1f2937;
        --muted: #6b7280;
        --border: #dbe3ef;
        --primary: #0f766e;
        --primary-hover: #0b5f59;
        --focus: #99f6e4;
    }

    body {
        margin: 0;
        font-family: "Manrope", sans-serif;
        color: var(--text);
        background:
            radial-gradient(circle at 10% 0%, #dbeafe 0%, transparent 35%),
            radial-gradient(circle at 100% 100%, #ccfbf1 0%, transparent 30%),
            linear-gradient(135deg, var(--bg-1), var(--bg-2));
    }

    .page {
        min-height: 95vh;
        display: grid;
        place-items: center;
        padding: 24px;
    }

    .form-card {
        width: 100%;
        max-width: 520px;
        background: var(--card);
        border: 1px solid var(--border);
        border-radius: 14px;
        box-shadow: 0 12px 32px rgba(15, 23, 42, 0.08);
        padding: 26px;
    }

    .form-card h1 {
        margin: 0 0 6px;
        font-size: 1.5rem;
        font-weight: 700;
    }

    .form-card p {
        margin: 0 0 22px;
        color: var(--muted);
        font-size: 0.95rem;
    }

    .field {
        display: flex;
        flex-direction: column;
        gap: 8px;
        margin-bottom: 14px;
    }

    .field label {
        font-weight: 600;
        font-size: 0.95rem;
    }

    .field input,
    .field textarea {
        border: 1px solid var(--border);
        border-radius: 10px;
        padding: 11px 12px;
        font: inherit;
        color: var(--text);
        background: #fff;
        transition: border-color 0.2s ease, box-shadow 0.2s ease;
    }

    .field input:focus,
    .field textarea:focus {
        outline: none;
        border-color: var(--primary);
        box-shadow: 0 0 0 4px var(--focus);
    }

    .actions {
        margin-top: 18px;
    }

    .actions button {
        width: 100%;
        border: 0;
        border-radius: 10px;
        padding: 12px 14px;
        font: inherit;
        font-weight: 700;
        color: #fff;
        background: var(--primary);
        cursor: pointer;
        transition: background-color 0.2s ease, transform 0.1s ease;
    }

    .actions button:hover {
        background: var(--primary-hover);
    }

    .actions button:active {
        transform: translateY(1px);
    }

    @media (max-width: 640px) {
        .form-card {
            padding: 20px;
            border-radius: 12px;
        }
    }

    .table-wrap {
        width: 100%;
        max-width: 980px;
        margin: 40px auto;
        background: #fff;
        border: 1px solid var(--border);
        border-radius: 14px;
        box-shadow: 0 12px 32px rgba(15, 23, 42, 0.08);
        overflow: hidden;
    }

    .table-title {
        padding: 16px 18px;
        font-weight: 700;
        border-bottom: 1px solid var(--border);
        background: linear-gradient(90deg, #f0fdfa, #eff6ff);
    }

    .table {
        width: 100%;
        border-collapse: collapse;
    }

    .table thead {
        background: #f8fafc;
    }

    .table th,
    .table td {
        padding: 14px 16px;
        text-align: left;
        border-bottom: 1px solid var(--border);
        vertical-align: middle;
    }

    .table th {
        font-size: 0.85rem;
        text-transform: uppercase;
        letter-spacing: 0.04em;
        color: #475569;
    }

    .table tbody tr:nth-child(even) {
        background: #fcfdff;
    }

    .table tbody tr:hover {
        background: #f0fdfa;
    }

    .cell-actions {
        display: flex;
        gap: 8px;
        flex-wrap: wrap;
    }

    .btn-link {
        display: inline-block;
        padding: 7px 10px;
        border-radius: 8px;
        font-size: 0.85rem;
        font-weight: 700;
        text-decoration: none;
        border: 1px solid transparent;
        transition: 0.2s ease;
    }

    .btn-edit {
        color: #0f766e;
        background: #ecfeff;
        border-color: #99f6e4;
    }

    .btn-edit:hover {
        background: #ccfbf1;
    }

    .btn-delete {
        color: #b91c1c;
        background: #fef2f2;
        border-color: #fecaca;
    }

    .btn-delete:hover {
        background: #fee2e2;
    }

    @media (max-width: 768px) {
        .table-wrap {
            margin: 24px auto;
        }

        .table th,
        .table td {
            padding: 10px 12px;
            font-size: 0.9rem;
        }
    }
</style>

<div class="table-wrap">
    <div class="table-title">Usuários cadastrados</div>

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Telefone</th>
                <th>Data de Nascimento</th>
                <th>Endereço</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $user) : ?>
                <tr>
                    <td><?= htmlspecialchars($user['id']) ?></td>
                    <td><?= htmlspecialchars($user['nome']) ?></td>
                    <td><?= htmlspecialchars($user['telefone']) ?></td>
                    <td><?= htmlspecialchars($user['data_nasc']) ?></td>
                    <td><?= htmlspecialchars($user['endereco']) ?></td>
                    <td class="cell-actions">
                        <a class="btn-link btn-edit" href="../index.php?id=<?= $user['id'] ?>">Editar</a>
                        <a class="btn-link btn-delete" href="../actions/delete.php?id=<?= $user['id'] ?>" onclick="return confirm('Tem certeza que deseja excluir este usuário?')">Excluir</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>