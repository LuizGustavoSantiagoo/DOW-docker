<?php
include './partials/header.html';
include './actions/connect.php';

$id = $_GET['id'] ?? null;

if($id) {
    $sql = "SELECT * FROM users WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['id' => $id]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$user) {
        header('Location: ./index.php');
        exit;
    }
}
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
</style>

<div class="page">
    <div class="form-card">
        <h1>Criar Usuário</h1>
        <p>Preencha os dados abaixo para cadastrar um novo usuário.</p>

        <div>
            <?php
            $r = $_GET['r'] ?? null;
            $id = $_GET['id'] ?? null;;

            if ($r === 'sucesso') {
                echo '<div style="padding: 12px; background-color: #d1fae5; color: #065f46; border-radius: 8px; margin-bottom: 16px;">Usuário '. ($id ? 'atualizado' : 'criado') . ' com sucesso!</div>';
            } elseif ($r === 'erro') {
                echo '<div style="padding: 12px; background-color: #fee2e2; color: #991b1b; border-radius: 8px; margin-bottom: 16px;">Ocorreu um erro ao ' . ($id ? 'atualizar' : 'criar') . ' o usuário. Tente novamente.</div>';
            }
        ?>
        </div>

        <form action="<?php echo $id ? '../actions/update.php' : '../actions/create.php'; ?>" method="POST">
            <input type="hidden" name="id" value="<?php echo $id ? htmlspecialchars($id) : ''; ?>">

            <div class="field">
                <label for="nome">Nome</label>
                <input require type="text" id="nome" name="nome" value="<?php echo isset($user['nome']) ? htmlspecialchars($user['nome']) : ''; ?>" required>
            </div>

            <div class="field">
                <label for="telefone">Telefone</label>
                <input require type="tel" id="telefone" name="telefone" value="<?php echo isset($user['telefone']) ? htmlspecialchars($user['telefone']) : ''; ?>"   required>
            </div>

            <div class="field">
                <label for="data_nasc">Data de nascimento</label>
                <input require type="date" id="data_nasc" name="data_nasc" value="<?php echo isset($user['data_nasc']) ? htmlspecialchars($user['data_nasc']) : ''; ?>" required>
            </div>

            <div class="field">
                <label for="endereco">Endereço</label>
                <textarea require id="endereco" name="endereco" rows="3" required><?php echo isset($user['endereco']) ? htmlspecialchars($user['endereco']) : ''; ?></textarea>
            </div>

            <div class="actions">
                <button type="submit"><?php echo $id ? 'Atualizar' : 'Criar'; ?> usuário</button>
            </div>
        </form>
    </div>
</div>