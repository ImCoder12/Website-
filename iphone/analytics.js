// analytics.js - ультра-простой, но мощный трекинг
class UltraAnalytics {
  constructor() {
    this.sessionId = 'sess_' + Math.random().toString(36).slice(2, 11) + '_' + Date.now().toString(36);
    this.startTime = Date.now();
    this.currentPage = window.location.pathname || '/';
    this.events = [];
    
    this.initSession();
    this.setupTracking();
  }
  
  initSession() {
    this.track('session_start', `time=${this.getTime()}`);
  }
  
  setupTracking() {
    // Трек страницы
    this.track('pageview', `url=${this.currentPage}`);
    
    // Трек кликов
    document.addEventListener('click', e => {
      const target = e.target;
      this.track('click', 
        `tag=${target.tagName}|id=${target.id || 'none'}|class=${target.className || 'none'}|x=${e.clientX}|y=${e.clientY}`
      );
    });
    
    // Трек скролла
    let lastScrollReport = 0;
    window.addEventListener('scroll', () => {
      const now = Date.now();
      if (now - lastScrollReport > 1000) {
        const scrollPercent = Math.round((window.scrollY / (document.body.scrollHeight - window.innerHeight)) * 100);
        this.track('scroll', `percent=${scrollPercent}|time=${this.getTime()}`);
        lastScrollReport = now;
      }
    });
    
    // Трек времени на странице
    window.addEventListener('beforeunload', () => {
      const sessionDuration = Math.round((Date.now() - this.startTime) / 1000);
      this.track('session_end', `duration=${sessionDuration}s|pages=${this.getPageViews()}`);
      this.saveEvents();
    });
  }
  
  track(eventType, eventData) {
    const event = `${this.getTime()}|${this.sessionId}|${eventType}|${this.currentPage}|${eventData}`;
    this.events.push(event);
    
    // Автосохранение каждые 3 события
    if (this.events.length % 3 === 0) this.saveEvents();
  }
  
  saveEvents() {
    const existing = localStorage.getItem('ultra_analytics') || '';
    const newData = existing ? existing + '\n' + this.events.join('\n') : this.events.join('\n');
    localStorage.setItem('ultra_analytics', newData);
    this.events = [];
  }
  
  getTime() {
    const d = new Date();
    return `${d.getHours()}:${d.getMinutes()}:${d.getSeconds()}`;
  }
  
  getPageViews() {
    return this.events.filter(e => e.includes('|pageview|')).length + 1;
  }
  
  static getData() {
    const rawData = localStorage.getItem('ultra_analytics') || '';
    return rawData.split('\n').filter(line => line.trim() !== '');
  }
}

// Инициализация только не на странице аналитики
if (!window.location.pathname.includes('analytics.html')) {
  window.ultraAnalytics = new UltraAnalytics();
}