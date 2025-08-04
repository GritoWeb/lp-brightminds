<?php
/**
 * Bloco ACF: Formulário de Cadastro
 */

// ID único para o bloco
$block_id = 'cadastro-form-' . $block['id'];
?>

<div id="<?php echo esc_attr($block_id); ?>" class="cadastro-form-block">
    <div style="text-align: center;">
        <form method="post" action="#" accept-charset="utf-8" id="FormCadastro-<?php echo esc_attr($block['id']); ?>" class="h-widget-form" data-language='{"error_name":"Nome obrigatório","error_email":"Email obrigatório","error_email_invalid":"Email inválido"}'>
            <input type="hidden" name="realm" value="https://membros.escolabrightminds.com.br" />
            <input type="hidden" name="token" value="e6ed7ddf0425cbdda5c445c140d32c8c" />
            <input type="hidden" name="redirect" value="/" />
            <input type="text" name="nome" placeholder="Insira seu nome" required />
            <input type="email" name="email" placeholder="Insira seu email" required />
            <input type="text" name="celular" placeholder="Insira seu celular" maxlength="15" onkeyup="_registerHandlePhone(event)" />
            <button type="submit">Receber acesso gratuito</button>
        </form>
    </div>
</div>

<style>
#<?php echo esc_attr($block_id); ?> #FormCadastro-<?php echo esc_attr($block['id']); ?> {
    width: 400px;
    max-width: 100%;
    font-family: Arial, sans-serif;
    display: inline-block; /* permite centralizar */
}

#<?php echo esc_attr($block_id); ?> #FormCadastro-<?php echo esc_attr($block['id']); ?> > * {
    box-sizing: border-box;
    display: block;
    width: 100%;
    border-radius: 4px;
}

#<?php echo esc_attr($block_id); ?> #FormCadastro-<?php echo esc_attr($block['id']); ?> input._error {
    border-color: red;
}

#<?php echo esc_attr($block_id); ?> #FormCadastro-<?php echo esc_attr($block['id']); ?> div._error {
    text-align: right;
    font-size: 0.7rem;
    text-transform: uppercase;
    margin-bottom: 5px;
    color: red;
}

#<?php echo esc_attr($block_id); ?> #FormCadastro-<?php echo esc_attr($block['id']); ?> input {
    padding: 0 10px;
    margin-bottom: 5px;
    line-height: 42px;
    border: 1px solid #212121;
}

#<?php echo esc_attr($block_id); ?> #FormCadastro-<?php echo esc_attr($block['id']); ?> button {
    border: none;
    line-height: 42px;
    cursor: pointer;
    text-transform: uppercase;
    letter-spacing: 1px;
    background: #ffda00;
    color: #000000;
    font-weight: bold;
    transition: all 0.3s ease;
}

#<?php echo esc_attr($block_id); ?> #FormCadastro-<?php echo esc_attr($block['id']); ?> button:hover {
    background: #FFFFFF;
    color: #ffda00;
    border: 1px solid #ffda00;
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const formId = 'FormCadastro-<?php echo esc_js($block['id']); ?>';
    const form = document.getElementById(formId);
    
    if (form) {
        // Adicionar tag freemium se não existir
        if (!form.querySelector('input[name="tag"]')) {
            const hiddenInput = document.createElement('input');
            hiddenInput.type = 'hidden';
            hiddenInput.name = 'tag';
            hiddenInput.value = 'freemium';
            hiddenInput.id = 'freemium-tag-<?php echo esc_js($block['id']); ?>';
            form.appendChild(hiddenInput);
        }
        
        // Carregar script externo apenas uma vez por página
        const scriptId = 'ptl-cadastro-script';
        if (!document.getElementById(scriptId)) {
            const script = document.createElement('script');
            script.type = 'text/javascript';
            script.src = 'https://cdn.areademembros.com/assets/ptl-cadastro.js';
            script.id = scriptId;
            script.async = true;
            script.defer = true;
            
            // Adicionar callback de sucesso se necessário
            script.onload = function() {
                console.log('Script de cadastro carregado com sucesso');
                // Aqui você pode adicionar qualquer inicialização adicional se necessário
            };
            
            script.onerror = function() {
                console.error('Erro ao carregar script de cadastro');
            };
            
            document.head.appendChild(script);
        }
        
        // Adicionar classe para compatibilidade
        if (!form.classList.contains('h-widget-form')) {
            form.classList.add('h-widget-form');
        }
    }
});
</script>
