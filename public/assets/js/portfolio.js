/**
 * Arjuna Carly Dhymas Mahendra — Portfolio Interactive Engine
 * Cinematic Editorial Features:
 * 1. Fluid Custom Interactive Cursor (Follower + Dot + Hover Blending + 'LIHAT' View Tag)
 * 2. Circular Ripple Mask Theme Transition (from clicked button position)
 * 3. Client-Side Studio Background Cutout for Hero Portrait
 * 4. Smooth Inertial Momentum Scroll
 * 5. Scroll-Driven Reveal Engine (IntersectionObserver Staggered Fade-Up)
 * 6. 3D Perspective Depth Tilt on Project Preview Mockups
 * 7. Live Obsidian Network Graph with Physics, Draggable Nodes, & Energy Wave Pulses
 */

document.addEventListener('DOMContentLoaded', () => {
  const root = document.documentElement;

  // =========================================================================
  // 1. DEFAULT OS CURSOR (Active)
  // =========================================================================

  // =========================================================================
  // 2. SMOOTH THEME TRANSITION (Non-obstructive cross-fade)
  // =========================================================================
  const savedTheme = localStorage.getItem('arjuna_theme') || 'dark';
  root.setAttribute('data-theme', savedTheme);

  const themeToggles = document.querySelectorAll('.theme-toggle-switch, #theme-toggle-btn');

  themeToggles.forEach(btn => {
    btn.addEventListener('click', () => {
      const currentTheme = root.getAttribute('data-theme') === 'light' ? 'light' : 'dark';
      const nextTheme = currentTheme === 'dark' ? 'light' : 'dark';

      // 1. Animate toggle button icon smoothly
      btn.classList.add('theme-btn-rotating');
      setTimeout(() => btn.classList.remove('theme-btn-rotating'), 450);

      // 2. Smoothly crossfade page colors without covering the website
      root.classList.add('theme-transitioning');
      root.setAttribute('data-theme', nextTheme);
      localStorage.setItem('arjuna_theme', nextTheme);

      setTimeout(() => {
        root.classList.remove('theme-transitioning');
      }, 450);
    });
  });

  // =========================================================================
  // 3. HERO PORTRAIT 3D PARALLAX & SCROLL SLIDE-OUT ENGINE
  // =========================================================================
  const heroSection = document.querySelector('.hero-cinematic');
  const heroPortrait = document.getElementById('hero-portrait-img');
  const heroNameTop = document.getElementById('hero-name-top');
  const heroNameBottom = document.getElementById('hero-name-bottom');
  const heroCornerBrackets = document.querySelectorAll('.corner-bracket');
  const heroSideScroll = document.querySelector('.hero-side-scroll');

  let mouseNormX = 0;
  let mouseNormY = 0;
  let targetTiltX = 0;
  let targetTiltY = 0;
  let currentTiltX = 0;
  let currentTiltY = 0;
  let entranceDone = false;
  let heroRafId = null;

  const markEntranceDone = () => {
    if (!entranceDone) {
      entranceDone = true;
      if (heroNameTop) heroNameTop.classList.add('entrance-done');
      if (heroNameBottom) heroNameBottom.classList.add('entrance-done');
      requestHeroUpdate();
    }
  };

  // If user begins scrolled down or scrolls, unlock immediately
  if (window.scrollY > 8) {
    markEntranceDone();
  } else {
    setTimeout(markEntranceDone, 1450);
  }

  const updateHeroVisuals = () => {
    heroRafId = null;

    // Portrait 3D Tilt Lerp
    if (heroPortrait) {
      currentTiltX += (targetTiltX - currentTiltX) * 0.1;
      currentTiltY += (targetTiltY - currentTiltY) * 0.1;
      heroPortrait.style.transform = `perspective(1000px) rotateY(${currentTiltX}deg) rotateX(${currentTiltY}deg)`;
    }

    // Scroll Slide-Out Progress (0 = top, 1 = scrolled to next section)
    const scrollY = window.scrollY;
    const heroHeight = heroSection ? heroSection.offsetHeight : (window.innerHeight || 800);
    const scrollProgress = Math.min(1, Math.max(0, scrollY / (heroHeight * 0.58)));

    if (entranceDone) {
      const exitVw = scrollProgress * 65; // Slide out distance in vw
      const mouseFactor = (1 - scrollProgress);
      const mouseShiftX = mouseNormX * 22 * mouseFactor; // Subtle mouse parallax in px
      const nameOpacity = Math.max(0, 1 - scrollProgress * 1.35);

      // Line 1: Arjuna Carly slides OUT to the LEFT
      if (heroNameTop) {
        heroNameTop.style.transform = `translate3d(calc(-${exitVw}vw + ${-mouseShiftX}px), 0, 0)`;
        heroNameTop.style.opacity = nameOpacity;
      }

      // Line 2: Dhymas Mahendra slides OUT to the RIGHT
      if (heroNameBottom) {
        heroNameBottom.style.transform = `translate3d(calc(${exitVw}vw + ${mouseShiftX}px), 0, 0)`;
        heroNameBottom.style.opacity = nameOpacity;
      }
    }

    // Viewfinder HUD fade out on scroll
    const hudOpacity = Math.max(0, 1 - scrollProgress * 2.2);
    heroCornerBrackets.forEach(b => {
      b.style.opacity = hudOpacity * 0.6;
    });
    if (heroSideScroll) {
      heroSideScroll.style.opacity = hudOpacity;
      heroSideScroll.style.transform = `translateY(${scrollProgress * 20}px)`;
    }

    // Keep loop active if 3D tilt is still converging
    if (Math.abs(targetTiltX - currentTiltX) > 0.05 || Math.abs(targetTiltY - currentTiltY) > 0.05) {
      requestHeroUpdate();
    }
  };

  const requestHeroUpdate = () => {
    if (!heroRafId) {
      heroRafId = requestAnimationFrame(updateHeroVisuals);
    }
  };

  // Passive Scroll Listener
  window.addEventListener('scroll', () => {
    if (window.scrollY > 8 && !entranceDone) {
      markEntranceDone();
    }
    requestHeroUpdate();
  }, { passive: true });

  // Mousemove Parallax (Fine Pointers only)
  if (heroSection && window.matchMedia('(hover: hover) and (pointer: fine)').matches) {
    heroSection.addEventListener('mousemove', (e) => {
      const rect = heroSection.getBoundingClientRect();
      mouseNormX = (e.clientX - rect.left) / rect.width - 0.5;
      mouseNormY = (e.clientY - rect.top) / rect.height - 0.5;

      targetTiltX = mouseNormX * 8;
      targetTiltY = -mouseNormY * 6;

      requestHeroUpdate();
    }, { passive: true });

    heroSection.addEventListener('mouseleave', () => {
      mouseNormX = 0;
      mouseNormY = 0;
      targetTiltX = 0;
      targetTiltY = 0;
      requestHeroUpdate();
    });
  }

  // Initial trigger
  requestHeroUpdate();

  // =========================================================================
  // 4. SCROLL-DRIVEN ENTRANCE REVEAL ENGINE
  // =========================================================================
  const revealElements = document.querySelectorAll('.reveal-init');
  if ('IntersectionObserver' in window && revealElements.length > 0) {
    const revealObserver = new IntersectionObserver((entries, observer) => {
      entries.forEach((entry) => {
        if (entry.isIntersecting) {
          entry.target.classList.add('revealed');
          observer.unobserve(entry.target);
        }
      });
    }, {
      threshold: 0.1,
      rootMargin: '0px 0px -40px 0px'
    });

    revealElements.forEach((el) => revealObserver.observe(el));
  } else {
    revealElements.forEach((el) => el.classList.add('revealed'));
  }

  // =========================================================================
  // 5. NATIVE FLUID SCROLL SYSTEM (Compositor Thread 60-144 FPS)
  // =========================================================================
  // Browser native scroll-behavior: smooth handles all momentum and gestures
  // without wheel-event hijacking or stutter.

  // =========================================================================
  // 6. BACK TO TOP SMOOTH SCROLL & NAVBAR SCROLL SPY
  // =========================================================================
  const backToTopBtn = document.getElementById('back-to-top-btn');
  if (backToTopBtn) {
    backToTopBtn.addEventListener('click', () => {
      window.scrollTo({ top: 0, behavior: 'smooth' });
    });
  }

  const navLinks = document.querySelectorAll('#nav-pill-links a');
  const spySections = document.querySelectorAll('section[id]');
  if (navLinks.length > 0 && spySections.length > 0) {
    const updateActiveNav = () => {
      const scrollPos = window.scrollY + 220;
      let currentSectionId = '';
      spySections.forEach((sec) => {
        const top = sec.offsetTop;
        const height = sec.offsetHeight;
        if (scrollPos >= top && scrollPos < top + height) {
          currentSectionId = sec.id;
        }
      });
      if (currentSectionId) {
        navLinks.forEach((a) => {
          if (a.getAttribute('href') === `#${currentSectionId}`) {
            a.classList.add('active');
          } else {
            a.classList.remove('active');
          }
        });
      }
    };
    window.addEventListener('scroll', updateActiveNav, { passive: true });
    updateActiveNav();
  }

  // =========================================================================
  // 7. SPLIT-SCREEN PROJECT SHOWCASE & 3D PERSPECTIVE TILT
  // =========================================================================
  const projectRows = document.querySelectorAll('.project-row-item');
  const previewCounter = document.getElementById('preview-counter');
  const previewTitleBar = document.getElementById('preview-title-bar');
  const previewDescText = document.getElementById('preview-desc-text');
  const previewActionBtn = document.getElementById('preview-action-btn');
  const mockupItems = document.querySelectorAll('.mockup-item');
  const stickyPreviewBox = document.querySelector('.project-sticky-preview');

  const updateProjectPreview = (row) => {
    projectRows.forEach(r => r.classList.remove('active'));
    row.classList.add('active');

    const num = row.dataset.projNum || '01';
    const total = row.dataset.projTotal || '04';
    const title = row.dataset.projTitle || '';
    const desc = row.dataset.projDesc || '';
    const liveUrl = row.dataset.projUrl || '';
    const slug = row.dataset.projSlug || '';
    const mockupId = row.dataset.mockupId || 'mockup-proj-1';

    if (previewCounter) previewCounter.textContent = `${num} / ${total}`;
    if (previewTitleBar) previewTitleBar.textContent = title;
    if (previewDescText) previewDescText.textContent = desc;

    mockupItems.forEach(m => {
      if (m.id === mockupId) {
        m.classList.add('active');
      } else {
        m.classList.remove('active');
      }
    });

    if (previewActionBtn) {
      if (liveUrl && liveUrl !== '#') {
        previewActionBtn.href = liveUrl;
        previewActionBtn.textContent = 'Buka Website Live ↗';
        previewActionBtn.target = '_blank';
      } else {
        previewActionBtn.href = `/projects/${slug}`;
        previewActionBtn.textContent = 'Detail Studi Kasus →';
        previewActionBtn.target = '_self';
      }
    }
  };

  projectRows.forEach(row => {
    row.addEventListener('mouseenter', () => updateProjectPreview(row));
    row.addEventListener('click', (e) => {
      // If user clicked directly on the "Lihat Proyek →" link, allow standard navigation to /projects
      if (e.target.closest('.project-lihat-pill')) {
        return;
      }
      updateProjectPreview(row);
    });
  });

  if (stickyPreviewBox && window.matchMedia('(hover: hover) and (pointer: fine)').matches) {
    stickyPreviewBox.addEventListener('mousemove', (e) => {
      const rect = stickyPreviewBox.getBoundingClientRect();
      const x = e.clientX - rect.left;
      const y = e.clientY - rect.top;
      const centerX = rect.width / 2;
      const centerY = rect.height / 2;
      const rotateX = ((y - centerY) / centerY) * -5;
      const rotateY = ((x - centerX) / centerX) * 5;

      stickyPreviewBox.style.transform = `perspective(1000px) rotateX(${rotateX}deg) rotateY(${rotateY}deg) translateY(-2px)`;
    });

    stickyPreviewBox.addEventListener('mouseleave', () => {
      stickyPreviewBox.style.transform = 'perspective(1000px) rotateX(0deg) rotateY(0deg) translateY(0)';
    });
  }

  // =========================================================================
  // 8. OBSIDIAN-STYLE INTERACTIVE NODE GRAPH WITH LIVE ENERGY PULSES
  // =========================================================================
  const canvas = document.getElementById('obsidian-network-canvas');
  if (canvas) {
    const ctx = canvas.getContext('2d');
    let width = 0, height = 0;
    let dpr = window.devicePixelRatio || 1;

    const resize = () => {
      const rect = canvas.parentElement.getBoundingClientRect();
      width = rect.width;
      height = rect.height || 520;
      dpr = window.devicePixelRatio || 1;
      canvas.width = width * dpr;
      canvas.height = height * dpr;
      canvas.style.width = width + 'px';
      canvas.style.height = height + 'px';
      ctx.scale(dpr, dpr);
    };
    resize();
    window.addEventListener('resize', resize);

    const hubDefinitions = {
      'bahasa': { id: 'hub-bahasa', label: 'BAHASA', cluster: 'bahasa', isHub: true, x: 0.35, y: 0.4 },
      'framework': { id: 'hub-framework', label: 'FRAMEWORKS', cluster: 'framework', isHub: true, x: 0.65, y: 0.38 },
      'database': { id: 'hub-database', label: 'DATABASE', cluster: 'database', isHub: true, x: 0.38, y: 0.70 },
      'tools': { id: 'hub-tools', label: 'TOOLS', cluster: 'tools', isHub: true, x: 0.68, y: 0.72 },
    };

    const rawNodes = [
      hubDefinitions.bahasa,
      hubDefinitions.framework,
      hubDefinitions.database,
      hubDefinitions.tools,

      { id: 'php', label: 'PHP', cluster: 'bahasa', ox: -70, oy: -35 },
      { id: 'js', label: 'JavaScript', cluster: 'bahasa', ox: 55, oy: 45 },
      { id: 'html', label: 'HTML5 / CSS3', cluster: 'bahasa', ox: -55, oy: 50 },
      { id: 'ts', label: 'TypeScript', cluster: 'bahasa', ox: 70, oy: -30 },
      { id: 'sql', label: 'SQL Query', cluster: 'bahasa', ox: -10, oy: -60 },

      { id: 'laravel', label: 'Laravel', cluster: 'framework', ox: -55, oy: -45 },
      { id: 'react', label: 'React', cluster: 'framework', ox: 65, oy: -30 },
      { id: 'tailwind', label: 'Tailwind CSS', cluster: 'framework', ox: -45, oy: 50 },
      { id: 'bootstrap', label: 'Bootstrap 5', cluster: 'framework', ox: 60, oy: 45 },
      { id: 'livewire', label: 'Livewire', cluster: 'framework', ox: 10, oy: -65 },

      { id: 'mysql', label: 'MySQL', cluster: 'database', ox: -55, oy: -30 },
      { id: 'postgresql', label: 'PostgreSQL', cluster: 'database', ox: 60, oy: -25 },
      { id: 'sqlite', label: 'SQLite', cluster: 'database', ox: -15, oy: 45 },
      { id: 'restapi', label: 'RESTful API', cluster: 'database', ox: 50, oy: 40 },

      { id: 'figma', label: 'Figma UI/UX', cluster: 'tools', ox: -60, oy: -40 },
      { id: 'git', label: 'Git & GitHub', cluster: 'tools', ox: 60, oy: -30 },
      { id: 'vscode', label: 'VS Code', cluster: 'tools', ox: -35, oy: 45 },
      { id: 'scrum', label: 'Agile Scrum PM', cluster: 'tools', ox: 55, oy: 40 },
    ];

    const nodes = rawNodes.map(n => {
      const hub = hubDefinitions[n.cluster];
      const initialX = n.isHub ? (n.x * width) : ((hub ? hub.x * width : width / 2) + n.ox);
      const initialY = n.isHub ? (n.y * height) : ((hub ? hub.y * height : height / 2) + n.oy);

      return {
        ...n,
        x: initialX,
        y: initialY,
        vx: 0,
        vy: 0,
        baseX: initialX,
        baseY: initialY,
        radius: n.isHub ? 6 : 3.5,
        targetAlpha: 1,
        currentAlpha: 1,
        phase: Math.random() * Math.PI * 2,
      };
    });

    const edges = [
      ['hub-bahasa', 'hub-framework'],
      ['hub-framework', 'hub-tools'],
      ['hub-tools', 'hub-database'],
      ['hub-database', 'hub-bahasa'],
      ['hub-bahasa', 'hub-tools'],

      ['hub-bahasa', 'php'],
      ['hub-bahasa', 'js'],
      ['hub-bahasa', 'html'],
      ['hub-bahasa', 'ts'],
      ['hub-bahasa', 'sql'],

      ['hub-framework', 'laravel'],
      ['hub-framework', 'react'],
      ['hub-framework', 'tailwind'],
      ['hub-framework', 'bootstrap'],
      ['hub-framework', 'livewire'],

      ['hub-database', 'mysql'],
      ['hub-database', 'postgresql'],
      ['hub-database', 'sqlite'],
      ['hub-database', 'restapi'],

      ['hub-tools', 'figma'],
      ['hub-tools', 'git'],
      ['hub-tools', 'vscode'],
      ['hub-tools', 'scrum'],

      ['laravel', 'php'],
      ['react', 'js'],
      ['laravel', 'mysql'],
      ['react', 'tailwind'],
      ['figma', 'react'],
      ['scrum', 'git'],
    ];

    const energyPulses = edges.slice(0, 12).map((edge, i) => ({
      from: edge[0],
      to: edge[1],
      progress: (i * 0.1) % 1,
      speed: 0.006 + Math.random() * 0.004,
    }));

    let activeFilter = 'all';
    let hoveredNode = null;
    let draggedNode = null;
    let isPanning = false;
    let panStartX = 0, panStartY = 0;
    let offsetX = 0, offsetY = 0;
    let targetOffsetX = 0, targetOffsetY = 0;

    const getPos = (e) => {
      const rect = canvas.getBoundingClientRect();
      return {
        x: e.clientX - rect.left - offsetX,
        y: e.clientY - rect.top - offsetY,
      };
    };

    const findNodeAt = (x, y) => {
      for (let i = nodes.length - 1; i >= 0; i--) {
        const n = nodes[i];
        const dist = Math.hypot(n.x - x, n.y - y);
        if (dist <= (n.isHub ? 18 : 12)) {
          return n;
        }
      }
      return null;
    };

    canvas.addEventListener('mousedown', (e) => {
      const pos = getPos(e);
      const clicked = findNodeAt(pos.x, pos.y);
      if (clicked) {
        draggedNode = clicked;
      } else {
        isPanning = true;
        panStartX = e.clientX - offsetX;
        panStartY = e.clientY - offsetY;
      }
    });

    window.addEventListener('mousemove', (e) => {
      const rect = canvas.getBoundingClientRect();
      const rawX = e.clientX - rect.left;
      const rawY = e.clientY - rect.top;

      if (rawX >= 0 && rawX <= width && rawY >= 0 && rawY <= height) {
        const pos = getPos(e);
        hoveredNode = findNodeAt(pos.x, pos.y);
      } else {
        hoveredNode = null;
      }

      if (draggedNode) {
        const pos = getPos(e);
        draggedNode.x = pos.x;
        draggedNode.y = pos.y;
        draggedNode.vx = 0;
        draggedNode.vy = 0;
      } else if (isPanning) {
        targetOffsetX = e.clientX - panStartX;
        targetOffsetY = e.clientY - panStartY;
      }
    });

    window.addEventListener('mouseup', () => {
      draggedNode = null;
      isPanning = false;
    });

    // Touch support
    canvas.addEventListener('touchstart', (e) => {
      if (e.touches.length === 1) {
        const t = e.touches[0];
        const rect = canvas.getBoundingClientRect();
        const px = t.clientX - rect.left - offsetX;
        const py = t.clientY - rect.top - offsetY;
        const touched = findNodeAt(px, py);
        if (touched) {
          draggedNode = touched;
        } else {
          isPanning = true;
          panStartX = t.clientX - offsetX;
          panStartY = t.clientY - offsetY;
        }
      }
    });

    window.addEventListener('touchmove', (e) => {
      if (e.touches.length === 1) {
        const t = e.touches[0];
        const rect = canvas.getBoundingClientRect();
        if (draggedNode) {
          draggedNode.x = t.clientX - rect.left - offsetX;
          draggedNode.y = t.clientY - rect.top - offsetY;
        } else if (isPanning) {
          targetOffsetX = t.clientX - panStartX;
          targetOffsetY = t.clientY - panStartY;
        }
      }
    });

    window.addEventListener('touchend', () => {
      draggedNode = null;
      isPanning = false;
    });

    let time = 0;
    const tick = () => {
      time += 0.025;

      offsetX += (targetOffsetX - offsetX) * 0.12;
      offsetY += (targetOffsetY - offsetY) * 0.12;

      nodes.forEach((n) => {
        if (n !== draggedNode) {
          const floatX = Math.cos(time + n.phase) * 0.45;
          const floatY = Math.sin(time + n.phase) * 0.45;

          const dx = n.baseX - n.x;
          const dy = n.baseY - n.y;
          n.vx += dx * 0.025 + floatX;
          n.vy += dy * 0.025 + floatY;

          n.vx *= 0.86;
          n.vy *= 0.86;

          n.x += n.vx;
          n.y += n.vy;
        }

        const isMatch = activeFilter === 'all' || activeFilter === n.cluster;
        n.targetAlpha = isMatch ? 1 : 0.18;
        n.currentAlpha += (n.targetAlpha - n.currentAlpha) * 0.12;
      });

      const isLight = root.getAttribute('data-theme') === 'light';

      ctx.save();
      ctx.clearRect(0, 0, width, height);
      ctx.translate(offsetX, offsetY);

      ctx.strokeStyle = isLight ? 'rgba(15, 76, 117, 0.06)' : 'rgba(255, 255, 255, 0.025)';
      ctx.lineWidth = 1;
      const step = 40;
      const startX = -offsetX - ((-offsetX) % step);
      const startY = -offsetY - ((-offsetY) % step);
      for (let x = startX - step; x < startX + width + step * 2; x += step) {
        ctx.beginPath();
        ctx.moveTo(x, -offsetY - 20);
        ctx.lineTo(x, -offsetY + height + 20);
        ctx.stroke();
      }
      for (let y = startY - step; y < startY + height + step * 2; y += step) {
        ctx.beginPath();
        ctx.moveTo(-offsetX - 20, y);
        ctx.lineTo(-offsetX + width + 20, y);
        ctx.stroke();
      }

      edges.forEach(([fromId, toId]) => {
        const fromNode = nodes.find(n => n.id === fromId);
        const toNode = nodes.find(n => n.id === toId);
        if (!fromNode || !toNode) return;

        const isHubBackbone = fromNode.isHub && toNode.isHub;
        const isClusterMatch = activeFilter === 'all' || 
          (fromNode.cluster === activeFilter && toNode.cluster === activeFilter);
        const isHoverConnected = hoveredNode && (hoveredNode.id === fromId || hoveredNode.id === toId);

        let strokeColor = isLight ? 'rgba(15, 76, 117, 0.15)' : 'rgba(255, 255, 255, 0.08)';
        let lineWidth = 1;

        if (isHoverConnected) {
          strokeColor = '#3282B8';
          lineWidth = 1.8;
        } else if (isClusterMatch) {
          if (isHubBackbone) {
            strokeColor = isLight ? 'rgba(15, 76, 117, 0.65)' : 'rgba(50, 130, 184, 0.55)';
            lineWidth = 1.4;
          } else {
            strokeColor = isLight ? 'rgba(50, 130, 184, 0.45)' : 'rgba(187, 225, 250, 0.22)';
            lineWidth = 1.1;
          }
        } else {
          strokeColor = isLight ? 'rgba(15, 76, 117, 0.04)' : 'rgba(255, 255, 255, 0.03)';
        }

        ctx.strokeStyle = strokeColor;
        ctx.lineWidth = lineWidth;
        ctx.beginPath();
        ctx.moveTo(fromNode.x, fromNode.y);
        ctx.lineTo(toNode.x, toNode.y);
        ctx.stroke();
      });

      energyPulses.forEach((pulse) => {
        pulse.progress += pulse.speed;
        if (pulse.progress > 1) pulse.progress = 0;

        const fromNode = nodes.find(n => n.id === pulse.from);
        const toNode = nodes.find(n => n.id === pulse.to);
        if (fromNode && toNode) {
          const px = fromNode.x + (toNode.x - fromNode.x) * pulse.progress;
          const py = fromNode.y + (toNode.y - fromNode.y) * pulse.progress;

          ctx.fillStyle = isLight ? 'rgba(15, 76, 117, 0.85)' : 'rgba(187, 225, 250, 0.9)';
          ctx.beginPath();
          ctx.arc(px, py, 2.2, 0, Math.PI * 2);
          ctx.fill();
        }
      });

      nodes.forEach(n => {
        const isHovered = hoveredNode === n;
        const isMatch = activeFilter === 'all' || activeFilter === n.cluster;

        ctx.save();
        ctx.globalAlpha = isHovered ? 1 : n.currentAlpha;

        if (n.isHub) {
          const hubColor = isLight 
            ? (isMatch ? '#0F4C75' : '#3282B8')
            : (isMatch ? '#3282B8' : '#0F4C75');

          ctx.fillStyle = isLight
            ? (isMatch ? 'rgba(15, 76, 117, 0.16)' : 'rgba(15, 76, 117, 0.08)')
            : (isMatch ? 'rgba(50, 130, 184, 0.35)' : 'rgba(15, 76, 117, 0.12)');
          ctx.beginPath();
          ctx.arc(n.x, n.y, isHovered ? 16 : 10, 0, Math.PI * 2);
          ctx.fill();

          ctx.fillStyle = hubColor;
          ctx.beginPath();
          ctx.arc(n.x, n.y, n.radius, 0, Math.PI * 2);
          ctx.fill();

          ctx.fillStyle = isLight
            ? (isMatch ? '#0e171d' : '#516f81')
            : (isMatch ? '#ffffff' : '#64748b');
          ctx.font = 'bold 11px "JetBrains Mono", monospace';
          ctx.fillText(n.label, n.x + 12, n.y + 4);
        } else {
          const dotColor = isLight
            ? (isHovered ? '#0F4C75' : (isMatch ? '#0F4C75' : '#94a3b8'))
            : (isHovered ? '#3282B8' : (isMatch ? '#BBE1FA' : '#475569'));

          if (isHovered) {
            ctx.fillStyle = isLight ? 'rgba(15, 76, 117, 0.25)' : 'rgba(50, 130, 184, 0.45)';
            ctx.beginPath();
            ctx.arc(n.x, n.y, 9, 0, Math.PI * 2);
            ctx.fill();
          }

          ctx.fillStyle = dotColor;
          ctx.beginPath();
          ctx.arc(n.x, n.y, n.radius, 0, Math.PI * 2);
          ctx.fill();

          ctx.fillStyle = isLight
            ? (isHovered ? '#0F4C75' : (isMatch ? '#0e171d' : '#516f81'))
            : (isHovered ? '#ffffff' : (isMatch ? '#BBE1FA' : '#475569'));
          ctx.font = '10px "JetBrains Mono", monospace';
          ctx.fillText(n.label, n.x + 8, n.y + 3);
        }

        ctx.restore();
      });

      ctx.restore();
      requestAnimationFrame(tick);
    };
    tick();

    document.querySelectorAll('.graph-cat-btn').forEach(btn => {
      btn.addEventListener('click', () => {
        document.querySelectorAll('.graph-cat-btn').forEach(b => b.classList.remove('active'));
        btn.classList.add('active');

        activeFilter = btn.dataset.cluster || 'all';

        const info = document.getElementById('graph-active-label');
        if (info) {
          info.textContent = btn.dataset.clusterLabel || 'Semua Hubungan Teknologi';
        }

        if (activeFilter === 'all') {
          targetOffsetX = 0;
          targetOffsetY = 0;
        } else {
          const targetHub = hubDefinitions[activeFilter];
          if (targetHub) {
            targetOffsetX = (width / 2) - (targetHub.x * width);
            targetOffsetY = (height / 2) - (targetHub.y * height);
          }
        }
      });
    });
  }

  // =========================================================================
  // 9. 1-CLICK COPY CLIPBOARD WITH INTERACTIVE FEEDBACK
  // =========================================================================
  document.querySelectorAll('[data-copy-text]').forEach(btn => {
    btn.addEventListener('click', () => {
      const text = btn.dataset.copyText;
      const origin = btn.textContent;
      if (navigator.clipboard && text) {
        navigator.clipboard.writeText(text).then(() => {
          btn.textContent = 'TERSERAP ✓';
          btn.style.background = 'var(--accent)';
          btn.style.color = '#fff';
          setTimeout(() => {
            btn.textContent = origin;
            btn.style.background = '';
            btn.style.color = '';
          }, 2000);
        });
      }
    });
  });
});
