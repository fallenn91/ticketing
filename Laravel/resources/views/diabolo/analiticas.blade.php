@extends('layouts.layout')

@section('content')
<div class="w-full h-full">
  <div class="w-full p-4">
    <div class="flex items-start justify-between mb-8 fade-up">
      <div>
        <p class="text-xs uppercase tracking-widest mb-1">Resumen general</p>
        <h1 class="font-display text-3xl font-bold">Activity Report</h1>
      </div>
      <div class="text-right">
        <p class="text-xs">Última actualización</p>
        <p class="text-sm text-gray-500 font-medium">Hoy, 09:41 AM</p>
      </div>
    </div>
    <!-- Metric Cards -->
    <div class="grid grid-cols-2 md:grid-cols-5 gap-3 mb-6">
      <div class="metric-card fade-up delay-1">
        <p class="text-xs mb-1">Publicaciones</p>
        <p class="text-2xl font-medium" id="mPost">–</p>
        <p class="text-xs mt-1" style="color:#1D9E75;">+24% vs anterior</p>
      </div>
      <div class="metric-card fade-up delay-2">
        <p class="text-xs mb-1">Ventas</p>
        <p class="text-2xl font-medium" id="mSales">–</p>
        <p class="text-xs mt-1" style="color:#1D9E75;">+11% vs anterior</p>
      </div>
      <div class="metric-card fade-up delay-3">
        <p class="text-xs mb-1">Ofertas de trabajo</p>
        <p class="text-2xl font-medium" id="mJobs">–</p>
        <p class="text-xs mt-1" style="color:#1D9E75;">+37% vs anterior</p>
      </div>
      <div class="metric-card fade-up delay-4">
        <p class="text-xs mb-1">Comentarios</p>
        <p class="text-2xl font-medium" id="mComments">–</p>
        <p class="text-xs mt-1" style="color:#1D9E75;">+19% vs anterior</p>
      </div>
      <div class="metric-card fade-up delay-5">
        <p class="text-xs mb-1">Usuarios activos</p>
        <p class="text-2xl font-medium" id="mUsers">–</p>
        <p class="text-xs mt-1" style="color:#1D9E75;">+31% vs anterior</p>
      </div>
    </div>
    <!-- Controls -->
  <div class="fade-up shadow-sm rounded-lg bg-white" style="animation-delay:0.35s;padding:1.25rem;margin-bottom:1.25rem;">
    <div class="flex flex-col gap-3">

      <!-- Período -->
      <div class="flex flex-wrap gap-2 items-center">
        <span class="text-xs uppercase tracking-widest text-neutral-600 w-16">Período</span>
        <button class="pill active" data-period="monthly"   onclick="setPeriod(this)">Mensual</button>
        <button class="pill"        data-period="weekly"    onclick="setPeriod(this)">Semanal</button>
        <button class="pill"        data-period="quarterly" onclick="setPeriod(this)">Trimestral</button>
      </div>

      <!-- Tipo -->
      <div class="flex flex-wrap gap-2 items-center">
        <span class="text-xs uppercase tracking-widest text-neutral-600 w-16">Tipo</span>
        <button class="pill active" data-type="bar"  onclick="setType(this)">Barras</button>
        <button class="pill"        data-type="line" onclick="setType(this)">Líneas</button>
      </div>

      <!-- Series -->
      <div class="flex flex-wrap gap-2 items-center">
        <span class="text-xs uppercase tracking-widest text-neutral-600 w-16">Series</span>
        <button class="series-btn on" data-key="posts"    style="color:#378ADD;border-color:#378ADD;" onclick="toggleSeries(this)">
          <span style="width:8px;height:8px;border-radius:2px;background:#378ADD;flex-shrink:0;"></span>Publicaciones
        </button>
        <button class="series-btn on" data-key="sales"    style="color:#1D9E75;border-color:#1D9E75;" onclick="toggleSeries(this)">
          <span style="width:8px;height:8px;border-radius:2px;background:#1D9E75;flex-shrink:0;"></span>Ventas
        </button>
        <button class="series-btn on" data-key="jobs"     style="color:#D85A30;border-color:#D85A30;" onclick="toggleSeries(this)">
          <span style="width:8px;height:8px;border-radius:2px;background:#D85A30;flex-shrink:0;"></span>Ofertas de trabajo
        </button>
        <button class="series-btn on" data-key="comments" style="color:#7F77DD;border-color:#7F77DD;" onclick="toggleSeries(this)">
          <span style="width:8px;height:8px;border-radius:2px;background:#7F77DD;flex-shrink:0;"></span>Comentarios
        </button>
        <button class="series-btn on" data-key="users"    style="color:#BA7517;border-color:#BA7517;" onclick="toggleSeries(this)">
          <span style="width:8px;height:8px;border-radius:2px;background:#BA7517;flex-shrink:0;"></span>Usuarios activos
        </button>
      </div>

    </div>
  </div>

  <!-- Chart -->
  <div class="fade-up rounded-lg shadow-sm bg-white" style="animation-delay:0.45s;padding:1.25rem;">
    <div style="position:relative;width:100%;height:360px;">
      <canvas id="activityChart" role="img" aria-label="Gráfico de actividad de aplicación por período y categoría.">
        Actividad mensual de la aplicación por categoría.
      </canvas>
    </div>
  </div>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.4.1/chart.umd.js"></script>
  <script>
    const DATA = {
      monthly: {
        labels:   ['Ene','Feb','Mar','Abr','May','Jun','Jul','Ago','Sep','Oct','Nov','Dic'],
        posts:    [820,640,980,1180,1420,1260,1100,1050,1340,1580,1290,1620],
        sales:    [510,390,620,740,880,760,690,710,820,1050,870,1100],
        jobs:     [180,140,230,310,420,380,290,260,350,480,410,540],
        comments: [1200,950,1450,1700,2100,1900,1650,1580,2000,2350,1950,2500],
        users:    [3400,2800,4100,4900,5800,5200,4700,4500,5600,6400,5300,6900]
      },
      weekly: {
        labels:   ['S1','S2','S3','S4','S5','S6','S7','S8','S9','S10','S11','S12'],
        posts:    [190,160,210,245,280,260,230,220,270,310,260,340],
        sales:    [120,95,140,165,200,180,160,170,190,240,200,260],
        jobs:     [42,35,55,72,98,90,68,62,84,115,98,130],
        comments: [290,240,330,390,480,440,380,360,460,540,450,580],
        users:    [820,700,980,1150,1380,1260,1120,1080,1340,1550,1280,1660]
      },
      quarterly: {
        labels:   ['Q1','Q2','Q3','Q4'],
        posts:    [2440,3860,3490,4490],
        sales:    [1520,2380,2220,3020],
        jobs:     [550,1110,900,1430],
        comments: [3600,5700,5230,6800],
        users:    [10300,15900,14800,18600]
      }
    };

    const SERIES = {
      posts:    { label:'Publicaciones',      color:'#378ADD' },
      sales:    { label:'Ventas',             color:'#1D9E75' },
      jobs:     { label:'Ofertas de trabajo', color:'#D85A30' },
      comments: { label:'Comentarios',        color:'#7F77DD' },
      users:    { label:'Usuarios activos',   color:'#BA7517' }
    };

    let currentPeriod = 'monthly';
    let currentType   = 'bar';
    let visible = { posts:true, sales:true, jobs:true, comments:true, users:true };

    function buildDatasets(type) {
      return Object.keys(SERIES).map(key => {
        const s = SERIES[key];
        const isLine = type === 'line';
        return {
          label: s.label,
          data: visible[key] ? DATA[currentPeriod][key] : [],
          backgroundColor: isLine ? 'transparent' : s.color + 'cc',
          borderColor: s.color,
          borderWidth: isLine ? 2 : 0,
          pointRadius: isLine ? 3 : 0,
          pointBackgroundColor: s.color,
          fill: false,
          borderRadius: isLine ? 0 : 4,
          borderSkipped: false,
          tension: 0.35,
          type: isLine ? 'line' : 'bar'
        };
      });
    }

    function updateMetrics() {
      const d = DATA[currentPeriod];
      const sum = arr => arr.reduce((a,b) => a+b, 0);
      const fmt = n => n >= 1000 ? (n/1000).toFixed(1)+'K' : n;
      document.getElementById('mPost').textContent     = fmt(sum(d.posts));
      document.getElementById('mSales').textContent    = fmt(sum(d.sales));
      document.getElementById('mJobs').textContent     = fmt(sum(d.jobs));
      document.getElementById('mComments').textContent = fmt(sum(d.comments));
      document.getElementById('mUsers').textContent    = fmt(sum(d.users));
    }

    Chart.defaults.color = '#555';

    const chart = new Chart(document.getElementById('activityChart'), {
      type: 'bar',
      data: { labels: DATA.monthly.labels, datasets: buildDatasets('bar') },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
          legend: { display: false },
          tooltip: {
            mode: 'index',
            intersect: false,
            backgroundColor: '#1e1e22',
            borderColor: '#2a2a2e',
            borderWidth: 1,
            titleColor: '#e8e6e1',
            bodyColor: '#888780',
            padding: 12,
            filter: item => item.parsed.y > 0,
            callbacks: {
              label: c => '  ' + c.dataset.label + ': ' + c.parsed.y.toLocaleString()
            }
          }
        },
        scales: {
          x: {
            ticks: { autoSkip:false, maxRotation:0, font:{ size:12 }, color:'#555' },
            grid:  { display: false },
            border:{ display: false }
          },
          y: {
            beginAtZero: true,
            ticks: {
              font:{ size:12 }, color:'#555',
              callback: v => v >= 1000 ? (v/1000).toFixed(0)+'K' : v
            },
            grid:  { color:'rgba(255,255,255,0.05)', lineWidth:0.5 },
            border:{ display: false }
          }
        }
      }
    });

    function refresh() {
      chart.data.labels   = DATA[currentPeriod].labels;
      chart.data.datasets = buildDatasets(currentType);
      chart.update();
      updateMetrics();
    }

    function setPeriod(btn) {
      currentPeriod = btn.dataset.period;
      document.querySelectorAll('[data-period]').forEach(b => b.classList.remove('active'));
      btn.classList.add('active');
      refresh();
    }

    function setType(btn) {
      currentType = btn.dataset.type;
      document.querySelectorAll('[data-type]').forEach(b => b.classList.remove('active'));
      btn.classList.add('active');
      refresh();
    }

    function toggleSeries(btn) {
      const key = btn.dataset.key;
      visible[key] = !visible[key];
      btn.classList.toggle('on',  visible[key]);
      btn.classList.toggle('off', !visible[key]);
      refresh();
    }

    updateMetrics();
  </script>
  </div>
</div>

@endsection