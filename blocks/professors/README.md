# Bloco ACF: Professores

## 📝 Descrição
Bloco para exibição de seção de professores/equipe com layout responsivo em grid, ideal para apresentar a equipe educacional ou corpo docente da instituição.

## 🔧 Recursos
- ✅ Grid responsivo de professores
- ✅ Fotos personalizáveis
- ✅ Informações completas (nome, cargo, descrição)
- ✅ Layout automaticamente ajustável
- ✅ Design moderno e clean
- ✅ Totalmente responsivo
- ✅ Fácil gerenciamento no backend
- ✅ Quantidade ilimitada de professores

## 📂 Estrutura de Arquivos
```
professors/
├── professors.php     # Template principal do bloco
├── register.php       # Registro do bloco ACF
└── README.md         # Documentação
```

## ⚙️ Campos Editáveis no Backend

### 📝 Conteúdo Principal
- **Título da Seção:** Título principal (ex: "Nossos Professores")
- **Subtítulo:** Descrição opcional da equipe
- **Texto Introdutório:** Parágrafo de apresentação da equipe

### 👨‍🏫 Lista de Professores
Para cada professor é possível configurar:

- **Foto:** Imagem do professor (recomendado: 300x300px)
- **Nome:** Nome completo do professor
- **Cargo/Título:** Posição ou especialidade (ex: "Professor de Matemática")
- **Descrição:** Biografia resumida ou qualificações
- **[Repetível]** Adicione quantos professores desejar

### 🎨 Configurações de Layout
- **Colunas Desktop:** Número de colunas no desktop (padrão: 3)
- **Colunas Mobile:** Número de colunas no mobile (padrão: 1)
- **Espaçamento:** Controle do espaçamento entre cards

## 🎨 Características Visuais
- **Cards elegantes:** Design moderno com sombras sutis
- **Fotos circulares:** Imagens dos professores em formato circular
- **Tipografia hierárquica:** Nome em destaque, cargo em menor evidência
- **Hover effects:** Efeitos suaves ao passar o mouse
- **Padding consistente:** Espaçamento uniforme em todos os elementos

## 📱 Responsividade
- **Desktop (lg+):** Grid de 3 colunas (configurável)
- **Tablet (md):** Grid de 2 colunas
- **Mobile (sm):** Grid de 1 coluna (configurável)
- **Imagens adaptáveis:** Redimensionamento automático
- **Texto fluido:** Ajuste automático do tamanho da fonte

## 🔗 Layout e Organização
- **CSS Grid:** Sistema moderno de layout
- **Auto-fit:** Colunas se ajustam automaticamente ao conteúdo
- **Consistent spacing:** Espaçamento uniforme entre elementos
- **Flexbox interno:** Alinhamento perfeito dentro de cada card
- **Responsive images:** Imagens otimizadas para diferentes telas

## 📋 Como Usar
1. **No Editor:**
   - Adicione o bloco "Professores" da categoria "BrightMinds"
   - Configure título e texto introdutório
   - Adicione professores usando o campo repetidor
   - Para cada professor: foto, nome, cargo e descrição
   - Ajuste configurações de layout conforme necessário

2. **No Frontend:**
   - Grid responsivo exibe todos os professores
   - Layout se adapta automaticamente à tela
   - Informações bem organizadas e legíveis
   - Fotos otimizadas para carregamento rápido

## 🚀 Funcionalidades Avançadas
- **Lazy loading:** Imagens carregam conforme necessário
- **Alt text automático:** Acessibilidade com nome do professor
- **SEO otimizado:** Markup semântico para melhor indexação
- **Schema.org ready:** Preparado para dados estruturados
- **Performance:** CSS otimizado e HTML semântico

## ⚠️ Observações
- Recomendado usar imagens quadradas para melhor resultado visual
- Máximo de 4 colunas no desktop para manter legibilidade
- Descrições muito longas podem quebrar o layout visual
- Fotos devem ter boa qualidade mas serem otimizadas para web
- Funciona perfeitamente sem JavaScript

## 🔧 Configuração Técnica
- **ACF Repeater:** Campo repetidor para lista dinâmica
- **CSS Grid:** Layout moderno e flexível
- **Responsive Design:** Mobile-first approach
- **Image optimization:** Suporte a WebP e lazy loading
- **Semantic HTML:** Markup acessível e SEO-friendly

## 💡 Dicas de Uso
- **Fotos consistentes:** Use mesmo estilo/filtro em todas as fotos
- **Descrições equilibradas:** Mantenha textos similares em tamanho
- **Ordem estratégica:** Organize por hierarquia ou alfabeticamente
- **Qualidade das imagens:** Use fotos profissionais quando possível
- **Atualizações regulares:** Mantenha informações sempre atualizadas

## 🎯 Casos de Uso Ideais
- Apresentação de corpo docente
- Equipe de consultores/especialistas
- Time de coordenadores de curso
- Palestrantes de eventos
- Mentores de programas educacionais