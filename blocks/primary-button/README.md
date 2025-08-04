# Bloco ACF: Botão Primário

## 📝 Descrição
Bloco para criação de botões personalizáveis com opções avançadas de estilo, cores, alinhamento e efeitos hover. Ideal para call-to-actions e navegação.

## 🔧 Recursos
- ✅ Texto do botão editável
- ✅ URL de destino configurável
- ✅ Cores personalizáveis (fundo e texto)
- ✅ Efeitos hover customizáveis
- ✅ Alinhamento (esquerda, centro, direita)
- ✅ Tamanho da fonte personalizado
- ✅ Largura customizável
- ✅ Peso da fonte configurável
- ✅ Bordas opcionais (sempre visível ou apenas no hover)
- ✅ Classe "open-modal" automática para integração com modais

## 📂 Estrutura de Arquivos
```
primary-button/
├── primary-button.php   # Template principal do bloco
├── register.php         # Registro do bloco ACF
├── backend.php          # Preview no editor
├── block.json          # Configuração do bloco
└── README.md           # Documentação
```

## ⚙️ Campos Editáveis no Backend

### 📝 Conteúdo
- **Texto do Botão:** Texto exibido no botão (padrão: "Inscreva-se")
- **URL do Botão:** Link de destino (padrão: "#")

### 🎨 Cores
- **Cor de Fundo:** Cor de fundo do botão (padrão: #007cba)
- **Cor do Texto:** Cor do texto do botão (padrão: #ffffff)
- **Cor de Fundo (Hover):** Cor de fundo ao passar o mouse (padrão: #ffffff)
- **Cor do Texto (Hover):** Cor do texto ao passar o mouse (padrão: #007cba)

### 📐 Layout e Design
- **Alinhamento:** Esquerda, Centro ou Direita (padrão: Centro)
- **Peso da Fonte:** Medium (500) ou Bold (700) (padrão: Bold)
- **Tamanho da Fonte:** Tamanho personalizado em pixels
- **Largura Personalizada:** Largura máxima do botão em pixels

### 🎯 Bordas
- **Ativar Borda no Hover:** Adiciona borda ao passar o mouse
- **Cor da Borda (Hover):** Cor da borda no hover (padrão: #242424)
- **Ativar Borda Sempre:** Mantém borda sempre visível (branca)

## 🎨 Estilos Padrão
- **Padding:** 12px vertical, 28px horizontal
- **Border Radius:** 24px (arredondado)
- **Transição:** 300ms para efeitos suaves
- **Fonte:** Inherit (herda do tema)
- **Classes fixas:** `!text-[1.58rem]`, `!py-1`, `!max-w-[440px]`

## 📱 Responsividade
- **Desktop:** Padding top 48px (lg:pt-12)
- **Mobile:** Padding vertical 32px (py-8)
- **Largura:** Responsiva com máximo configurável
- **Alinhamento:** Mantido em todas as resoluções

## 🔗 Integrações
- **Classe "open-modal":** Automática para integração com sistema de modais
- **Estilos inline:** Aplicados dinamicamente baseados nas configurações
- **CSS Variables:** Para efeitos hover personalizados

## 📋 Como Usar
1. **No Editor:**
   - Adicione o bloco "Botão Primário" da categoria "BrightMinds"
   - Configure texto, URL e cores
   - Ajuste alinhamento e dimensões conforme necessário
   - Ative bordas se desejado

2. **No Frontend:**
   - Botão totalmente funcional com link configurado
   - Efeitos hover suaves
   - Integração automática com modals se configurado

## 🚀 Funcionalidades Avançadas
- **IDs únicos:** Cada instância tem ID único para CSS específico
- **CSS encapsulado:** Estilos aplicados apenas ao bloco específico
- **Conversão automática:** Tamanhos em pixel convertidos para rem
- **Fallbacks:** Valores padrão para todos os campos
- **Sanitização:** Todos os outputs são sanitizados para segurança

## ⚠️ Observações
- O botão sempre inclui a classe `open-modal` para compatibilidade
- Estilos hover são aplicados via CSS variables para melhor performance
- Bordas podem ser configuradas independentemente (sempre ou só no hover)
- O bloco é totalmente responsivo e acessível
