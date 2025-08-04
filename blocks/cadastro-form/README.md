# Bloco ACF: Formulário de Cadastro

## 📝 Descrição
Bloco estático para formulário de cadastro de usuários na plataforma Bright Minds. Este bloco não possui campos editáveis no backend, conforme especificado.

## 🔧 Recursos
- ✅ Formulário de cadastro completo (Nome, Email, Celular)
- ✅ Validação automática de campos
- ✅ Formatação automática de telefone
- ✅ Integração com API externa (Área de Membros)
- ✅ Design responsivo
- ✅ Tag freemium automática
- ✅ Prevenção de carregamento duplicado do script externo

## 📂 Estrutura de Arquivos
```
cadastro-form/
├── cadastro-form.php    # Template principal do bloco
├── register.php         # Registro do bloco ACF
├── backend.php          # Preview no editor
└── README.md           # Documentação
```

## ⚙️ Configurações
Este bloco é **completamente estático** e não possui campos editáveis no backend. As configurações incluem:

- **Realm:** `https://membros.escolabrightminds.com.br`
- **Token:** `e6ed7ddf0425cbdda5c445c140d32c8c`
- **Redirect:** `/`
- **Tag automática:** `freemium`

## 🎨 Estilos
- Largura máxima: 400px
- Design centralizado
- Campos com bordas escuras (#212121)
- Botão amarelo (#ffda00) com hover em branco
- Font family: Arial, sans-serif

## 📱 Responsividade
- Largura máxima de 100% em dispositivos móveis
- Campos ocupam 100% da largura do container
- Design adaptável a diferentes tamanhos de tela

## 🔗 Integrações
- **Script externo:** `https://cdn.areademembros.com/assets/ptl-cadastro.js`
- **Função de formatação:** `_registerHandlePhone(event)`
- **Classe CSS:** `h-widget-form` para compatibilidade

## 📋 Como Usar
1. No editor do WordPress, adicione um novo bloco
2. Procure por "Formulário de Cadastro" na categoria "BrightMinds"
3. Insira o bloco - ele aparecerá automaticamente sem necessidade de configuração
4. Publique a página

## 🚀 Funcionalidades JavaScript
- Carregamento condicional do script externo (evita duplicação)
- Adição automática da tag "freemium"
- Validação de campos com mensagens de erro
- Formatação automática de telefone

## ⚠️ Importante
- Este bloco é estático e não pode ser editado no backend
- Todas as configurações estão fixas no código
- O script externo é carregado apenas uma vez por página
- IDs únicos são gerados automaticamente para cada instância do bloco
