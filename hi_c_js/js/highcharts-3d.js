/*
 Highcharts JS v5.0.0 (2016-09-29)

 3D features for Highcharts JS

 @license: www.highcharts.com/license
 */
(function(u) {
	"object" === typeof module && module.exports ? module.exports = u : u(Highcharts)
})(function(u) {
	(function(b) {
		var r = b.deg2rad, l = b.pick;
		b.perspective = function(p, t, y) {
			var h = t.options.chart.options3d, n = y ? t.inverted : !1, k = t.plotWidth / 2, f = t.plotHeight / 2, c = h.depth / 2, g = l(h.depth, 1) * l(h.viewDistance, 0), e = t.scale3d || 1, a = r * h.beta * (n ? -1 : 1), h = r * h.alpha * (n ? -1 : 1), d = Math.cos(h), q = Math.cos(-a), z = Math.sin(h), A = Math.sin(-a);
			y || (k += t.plotLeft, f += t.plotTop);
			return b.map(p, function(a) {
				var b, h;
				h = (n ? a.y : a.x) - k;
				var l = (n ?
						a.x : a.y) - f, p = (a.z || 0) - c;
				b = q * h - A * p;
				a = -z * A * h + d * l - q * z * p;
				h = d * A * h + z * l + d * q * p;
				l = 0 < g && g < Number.POSITIVE_INFINITY ? g / (h + c + g) : 1;
				b = b * l * e + k;
				a = a * l * e + f;
				return {x: n ? a : b, y: n ? b : a, z: h * e + c}
			})
		}
	})(u);
	(function(b) {
		function r(a) {
			var b = 0, m, e;
			for(m = 0; m < a.length; m++)e = (m + 1) % a.length, b += a[m].x * a[e].y - a[e].x * a[m].y;
			return b / 2
		}

		function l(a) {
			var b = 0, m;
			for(m = 0; m < a.length; m++)b += a[m].z;
			return a.length ? b / a.length : 0
		}

		function p(a, b, m, e, d, f, E, h) {
			var c = [], g = f - d;
			return f > d && f - d > Math.PI / 2 + 1E-4 ? (c = c.concat(p(a, b, m, e, d, d + Math.PI / 2, E, h)), c =
					c.concat(p(a, b, m, e, d + Math.PI / 2, f, E, h))) : f < d && d - f > Math.PI / 2 + 1E-4 ? (c = c.concat(p(a, b, m, e, d, d - Math.PI / 2, E, h)), c = c.concat(p(a, b, m, e, d - Math.PI / 2, f, E, h))) : ["C", a + m * Math.cos(d) - m * v * g * Math.sin(d) + E, b + e * Math.sin(d) + e * v * g * Math.cos(d) + h, a + m * Math.cos(f) + m * v * g * Math.sin(f) + E, b + e * Math.sin(f) - e * v * g * Math.cos(f) + h, a + m * Math.cos(f) + E, b + e * Math.sin(f) + h]
		}

		var t = Math.cos, y = Math.PI, h = Math.sin, n = b.animObject, k = b.charts, f = b.color, c = b.defined, g = b.deg2rad, e = b.each, a = b.extend, d = b.inArray, q = b.map, z = b.merge, A = b.perspective, u = b.pick,
			D = b.SVGElement, C = b.SVGRenderer, w = b.wrap, v = 4 * (Math.sqrt(2) - 1) / 3 / (y / 2);
		w(C.prototype, "init", function(a) {
			a.apply(this, [].slice.call(arguments, 1));
			e([{name: "darker", slope: .6}, {name: "brighter", slope: 1.4}], function(a) {
				this.definition({
					tagName: "filter",
					id: "highcharts-" + a.name,
					children: [{
						tagName: "feComponentTransfer",
						children: [{tagName: "feFuncR", type: "linear", slope: a.slope}, {
							tagName: "feFuncG",
							type: "linear",
							slope: a.slope
						}, {tagName: "feFuncB", type: "linear", slope: a.slope}]
					}]
				})
			}, this)
		});
		C.prototype.toLinePath =
			function(a, b) {
				var m = [];
				e(a, function(a) {
					m.push("L", a.x, a.y)
				});
				a.length && (m[0] = "M", b && m.push("Z"));
				return m
			};
		C.prototype.cuboid = function(a) {
			var e = this.g();
			a = this.cuboidPath(a);
			e.front = this.path(a[0]).attr({"class": "highcharts-3d-front", zIndex: a[3]}).add(e);
			e.top = this.path(a[1]).attr({"class": "highcharts-3d-top", zIndex: a[4]}).add(e);
			e.side = this.path(a[2]).attr({"class": "highcharts-3d-side", zIndex: a[5]}).add(e);
			e.fillSetter = function(a) {
				this.front.attr({fill: a});
				this.top.attr({fill: f(a).brighten(.1).get()});
				this.side.attr({fill: f(a).brighten(-.1).get()});
				this.color = a;
				return this
			};
			e.opacitySetter = function(a) {
				this.front.attr({opacity: a});
				this.top.attr({opacity: a});
				this.side.attr({opacity: a});
				return this
			};
			e.attr = function(a) {
				if(a.shapeArgs || c(a.x)) a = this.renderer.cuboidPath(a.shapeArgs || a), this.front.attr({
					d: a[0],
					zIndex: a[3]
				}), this.top.attr({d: a[1], zIndex: a[4]}), this.side.attr({
					d: a[2],
					zIndex: a[5]
				}); else return b.SVGElement.prototype.attr.call(this, a);
				return this
			};
			e.animate = function(a, e, b) {
				c(a.x) && c(a.y) ?
					(a = this.renderer.cuboidPath(a), this.front.attr({zIndex: a[3]}).animate({d: a[0]}, e, b), this.top.attr({zIndex: a[4]}).animate({d: a[1]}, e, b), this.side.attr({zIndex: a[5]}).animate({d: a[2]}, e, b), this.attr({zIndex: -a[6]})) : a.opacity ? (this.front.animate(a, e, b), this.top.animate(a, e, b), this.side.animate(a, e, b)) : D.prototype.animate.call(this, a, e, b);
				return this
			};
			e.destroy = function() {
				this.front.destroy();
				this.top.destroy();
				this.side.destroy();
				return null
			};
			e.attr({zIndex: -a[6]});
			return e
		};
		C.prototype.cuboidPath =
			function(a) {
				function e(a) {
					return g[a]
				}

				var b = a.x, d = a.y, f = a.z, h = a.height, E = a.width, c = a.depth, g = [{x: b, y: d, z: f}, {
					x: b + E,
					y: d,
					z: f
				}, {x: b + E, y: d + h, z: f}, {x: b, y: d + h, z: f}, {x: b, y: d + h, z: f + c}, {
					x: b + E,
					y: d + h,
					z: f + c
				}, {x: b + E, y: d, z: f + c}, {
					x: b,
					y: d,
					z: f + c
				}], g = A(g, k[this.chartIndex], a.insidePlotArea), f = function(a, b) {
					var d = [];
					a = q(a, e);
					b = q(b, e);
					0 > r(a) ? d = a : 0 > r(b) && (d = b);
					return d
				};
				a = f([3, 2, 1, 0], [7, 6, 5, 4]);
				b = [4, 5, 2, 3];
				d = f([1, 6, 7, 0], b);
				f = f([1, 2, 5, 6], [0, 7, 4, 3]);
				return [this.toLinePath(a, !0), this.toLinePath(d, !0), this.toLinePath(f, !0),
					l(a), l(d), l(f), 9E9 * l(q(b, e))]
			};
		b.SVGRenderer.prototype.arc3d = function(b) {
			function h(a) {
				var b = !1, e = {}, f;
				for(f in a)-1 !== d(f, k) && (e[f] = a[f], delete a[f], b = !0);
				return b ? e : !1
			}

			var m = this.g(), c = m.renderer, k = "x y r innerR start end".split(" ");
			b = z(b);
			b.alpha *= g;
			b.beta *= g;
			m.top = c.path();
			m.side1 = c.path();
			m.side2 = c.path();
			m.inn = c.path();
			m.out = c.path();
			m.onAdd = function() {
				var a = m.parentGroup, b = m.attr("class");
				m.top.add(m);
				e(["out", "inn", "side1", "side2"], function(e) {
					m[e].addClass(b + " highcharts-3d-side").add(a)
				})
			};
			m.setPaths = function(a) {
				var b = m.renderer.arc3dPath(a), e = 100 * b.zTop;
				m.attribs = a;
				m.top.attr({d: b.top, zIndex: b.zTop});
				m.inn.attr({d: b.inn, zIndex: b.zInn});
				m.out.attr({d: b.out, zIndex: b.zOut});
				m.side1.attr({d: b.side1, zIndex: b.zSide1});
				m.side2.attr({d: b.side2, zIndex: b.zSide2});
				m.zIndex = e;
				m.attr({zIndex: e});
				a.center && (m.top.setRadialReference(a.center), delete a.center)
			};
			m.setPaths(b);
			m.fillSetter = function(a) {
				var b = f(a).brighten(-.1).get();
				this.fill = a;
				this.side1.attr({fill: b});
				this.side2.attr({fill: b});
				this.inn.attr({fill: b});
				this.out.attr({fill: b});
				this.top.attr({fill: a});
				return this
			};
			e(["opacity", "translateX", "translateY", "visibility"], function(a) {
				m[a + "Setter"] = function(a, b) {
					m[b] = a;
					e(["out", "inn", "side1", "side2", "top"], function(e) {
						m[e].attr(b, a)
					})
				}
			});
			w(m, "attr", function(b, e, d) {
				var f;
				"object" === typeof e && (f = h(e)) && (a(m.attribs, f), m.setPaths(m.attribs));
				return b.call(this, e, d)
			});
			w(m, "animate", function(a, b, e, d) {
				var f, m = this.attribs, c;
				delete b.center;
				delete b.z;
				delete b.depth;
				delete b.alpha;
				delete b.beta;
				c = n(u(e, this.renderer.globalAnimation));
				if(c.duration) {
					b = z(b);
					if(f = h(b)) c.step = function(a, b) {
						function e(a) {
							return m[a] + (u(f[a], m[a]) - m[a]) * b.pos
						}

						b.elem.setPaths(z(m, {
							x: e("x"),
							y: e("y"),
							r: e("r"),
							innerR: e("innerR"),
							start: e("start"),
							end: e("end")
						}))
					};
					e = c
				}
				return a.call(this, b, e, d)
			});
			m.destroy = function() {
				this.top.destroy();
				this.out.destroy();
				this.inn.destroy();
				this.side1.destroy();
				this.side2.destroy();
				D.prototype.destroy.call(this)
			};
			m.hide = function() {
				this.top.hide();
				this.out.hide();
				this.inn.hide();
				this.side1.hide();
				this.side2.hide()
			};
			m.show = function() {
				this.top.show();
				this.out.show();
				this.inn.show();
				this.side1.show();
				this.side2.show()
			};
			return m
		};
		C.prototype.arc3dPath = function(a) {
			function b(a) {
				a %= 2 * Math.PI;
				a > Math.PI && (a = 2 * Math.PI - a);
				return a
			}

			var e = a.x, d = a.y, f = a.start, c = a.end - 1E-5, g = a.r, k = a.innerR, l = a.depth, q = a.alpha, n = a.beta, z = Math.cos(f), r = Math.sin(f);
			a = Math.cos(c);
			var A = Math.sin(c), x = g * Math.cos(n), g = g * Math.cos(q), v = k * Math.cos(n), w = k * Math.cos(q), k = l * Math.sin(n), B = l * Math.sin(q), l = ["M", e + x * z, d + g * r], l = l.concat(p(e, d, x, g, f, c, 0, 0)), l = l.concat(["L", e + v * a, d + w * A]), l = l.concat(p(e,
				d, v, w, c, f, 0, 0)), l = l.concat(["Z"]), C = 0 < n ? Math.PI / 2 : 0, n = 0 < q ? 0 : Math.PI / 2, C = f > -C ? f : c > -C ? -C : f, u = c < y - n ? c : f < y - n ? y - n : c, D = 2 * y - n, q = ["M", e + x * t(C), d + g * h(C)], q = q.concat(p(e, d, x, g, C, u, 0, 0));
			c > D && f < D ? (q = q.concat(["L", e + x * t(u) + k, d + g * h(u) + B]), q = q.concat(p(e, d, x, g, u, D, k, B)), q = q.concat(["L", e + x * t(D), d + g * h(D)]), q = q.concat(p(e, d, x, g, D, c, 0, 0)), q = q.concat(["L", e + x * t(c) + k, d + g * h(c) + B]), q = q.concat(p(e, d, x, g, c, D, k, B)), q = q.concat(["L", e + x * t(D), d + g * h(D)]), q = q.concat(p(e, d, x, g, D, u, 0, 0))) : c > y - n && f < y - n && (q = q.concat(["L", e + x * Math.cos(u) +
				k, d + g * Math.sin(u) + B]), q = q.concat(p(e, d, x, g, u, c, k, B)), q = q.concat(["L", e + x * Math.cos(c), d + g * Math.sin(c)]), q = q.concat(p(e, d, x, g, c, u, 0, 0)));
			q = q.concat(["L", e + x * Math.cos(u) + k, d + g * Math.sin(u) + B]);
			q = q.concat(p(e, d, x, g, u, C, k, B));
			q = q.concat(["Z"]);
			n = ["M", e + v * z, d + w * r];
			n = n.concat(p(e, d, v, w, f, c, 0, 0));
			n = n.concat(["L", e + v * Math.cos(c) + k, d + w * Math.sin(c) + B]);
			n = n.concat(p(e, d, v, w, c, f, k, B));
			n = n.concat(["Z"]);
			z = ["M", e + x * z, d + g * r, "L", e + x * z + k, d + g * r + B, "L", e + v * z + k, d + w * r + B, "L", e + v * z, d + w * r, "Z"];
			e = ["M", e + x * a, d + g * A, "L", e + x * a +
			k, d + g * A + B, "L", e + v * a + k, d + w * A + B, "L", e + v * a, d + w * A, "Z"];
			A = Math.atan2(B, -k);
			d = Math.abs(c + A);
			a = Math.abs(f + A);
			f = Math.abs((f + c) / 2 + A);
			d = b(d);
			a = b(a);
			f = b(f);
			f *= 1E5;
			c = 1E5 * a;
			d *= 1E5;
			return {
				top: l,
				zTop: 1E5 * Math.PI + 1,
				out: q,
				zOut: Math.max(f, c, d),
				inn: n,
				zInn: Math.max(f, c, d),
				side1: z,
				zSide1: .99 * d,
				side2: e,
				zSide2: .99 * c
			}
		}
	})(u);
	(function(b) {
		function r(b, c) {
			var g = b.plotLeft, e = b.plotWidth + g, a = b.plotTop, d = b.plotHeight + a, h = g + b.plotWidth / 2, k = a + b.plotHeight / 2, n = Number.MAX_VALUE, l = -Number.MAX_VALUE, r = Number.MAX_VALUE, t = -Number.MAX_VALUE,
				w, v = 1;
			w = [{x: g, y: a, z: 0}, {x: g, y: a, z: c}];
			p([0, 1], function(a) {
				w.push({x: e, y: w[a].y, z: w[a].z})
			});
			p([0, 1, 2, 3], function(a) {
				w.push({x: w[a].x, y: d, z: w[a].z})
			});
			w = y(w, b, !1);
			p(w, function(a) {
				n = Math.min(n, a.x);
				l = Math.max(l, a.x);
				r = Math.min(r, a.y);
				t = Math.max(t, a.y)
			});
			g > n && (v = Math.min(v, 1 - Math.abs((g + h) / (n + h)) % 1));
			e < l && (v = Math.min(v, (e - h) / (l - h)));
			a > r && (v = 0 > r ? Math.min(v, (a + k) / (-r + a + k)) : Math.min(v, 1 - (a + k) / (r + k) % 1));
			d < t && (v = Math.min(v, Math.abs((d - k) / (t - k))));
			return v
		}

		var l = b.Chart, p = b.each, t = b.merge, y = b.perspective,
			h = b.pick, n = b.wrap;
		l.prototype.is3d = function() {
			return this.options.chart.options3d && this.options.chart.options3d.enabled
		};
		l.prototype.propsRequireDirtyBox.push("chart.options3d");
		l.prototype.propsRequireUpdateSeries.push("chart.options3d");
		b.wrap(b.Chart.prototype, "isInsidePlot", function(b) {
			return this.is3d() || b.apply(this, [].slice.call(arguments, 1))
		});
		var k = b.getOptions();
		t(!0, k, {
			chart: {
				options3d: {
					enabled: !1, alpha: 0, beta: 0, depth: 100, fitToPlot: !0, viewDistance: 25, frame: {
						bottom: {size: 1}, side: {size: 1},
						back: {size: 1}
					}
				}
			},
			defs: {style: {textContent: k.defs.style.textContent + "\n.highcharts-3d-top{filter: url(#highcharts-brighter)}\n.highcharts-3d-side{filter: url(#highcharts-darker)}"}}
		});
		n(l.prototype, "setClassName", function(b) {
			b.apply(this, [].slice.call(arguments, 1));
			this.is3d() && (this.container.className += " highcharts-3d-chart")
		});
		b.wrap(b.Chart.prototype, "setChartSize", function(b) {
			var c = this.options.chart.options3d;
			b.apply(this, [].slice.call(arguments, 1));
			if(this.is3d()) {
				var g = this.inverted, e = this.clipBox,
					a = this.margin;
				e[g ? "y" : "x"] = -(a[3] || 0);
				e[g ? "x" : "y"] = -(a[0] || 0);
				e[g ? "height" : "width"] = this.chartWidth + (a[3] || 0) + (a[1] || 0);
				e[g ? "width" : "height"] = this.chartHeight + (a[0] || 0) + (a[2] || 0);
				this.scale3d = 1;
				!0 === c.fitToPlot && (this.scale3d = r(this, c.depth))
			}
		});
		n(l.prototype, "redraw", function(b) {
			this.is3d() && (this.isDirtyBox = !0);
			b.apply(this, [].slice.call(arguments, 1))
		});
		n(l.prototype, "renderSeries", function(b) {
			var c = this.series.length;
			if(this.is3d())for(; c--;)b = this.series[c], b.translate(), b.render(); else b.call(this)
		});
		l.prototype.retrieveStacks = function(b) {
			var c = this.series, g = {}, e, a = 1;
			p(this.series, function(d) {
				e = h(d.options.stack, b ? 0 : c.length - 1 - d.index);
				g[e] ? g[e].series.push(d) : (g[e] = {series: [d], position: a}, a++)
			});
			g.totalStacks = a + 1;
			return g
		}
	})(u);
	(function(b) {
		var r, l = b.Axis, p = b.Chart, t = b.each, y = b.extend, h = b.merge, n = b.perspective, k = b.pick, f = b.splat, c = b.Tick, g = b.wrap;
		g(l.prototype, "setOptions", function(b, a) {
			var d;
			b.call(this, a);
			this.chart.is3d() && (d = this.options, d.tickWidth = k(d.tickWidth, 0), d.gridLineWidth = k(d.gridLineWidth,
				1))
		});
		g(l.prototype, "render", function(b) {
			b.apply(this, [].slice.call(arguments, 1));
			if(this.chart.is3d()) {
				var a = this.chart, d = a.renderer, c = a.options.chart.options3d, f = c.frame, g = f.bottom, h = f.back, f = f.side, k = c.depth, n = this.height, l = this.width, p = this.left, y = this.top;
				this.isZAxis || (this.horiz ? (g = {
						x: p,
						y: y + (a.xAxis[0].opposite ? -g.size : n),
						z: 0,
						width: l,
						height: g.size,
						depth: k,
						insidePlotArea: !1
					}, this.bottomFrame ? this.bottomFrame.animate(g) : this.bottomFrame = d.cuboid(g).attr({
							"class": "highcharts-3d-frame highcharts-3d-frame-bottom",
							zIndex: a.yAxis[0].reversed && 0 < c.alpha ? 4 : -1
						}).add()) : (c = {
						x: p + (a.yAxis[0].opposite ? 0 : -f.size),
						y: y + (a.xAxis[0].opposite ? -g.size : 0),
						z: k,
						width: l + f.size,
						height: n + g.size,
						depth: h.size,
						insidePlotArea: !1
					}, this.backFrame ? this.backFrame.animate(c) : this.backFrame = d.cuboid(c).attr({
							"class": "highcharts-3d-frame highcharts-3d-frame-back",
							zIndex: -3
						}).add(), a = {
						x: p + (a.yAxis[0].opposite ? l : -f.size),
						y: y + (a.xAxis[0].opposite ? -g.size : 0),
						z: 0,
						width: f.size,
						height: n + g.size,
						depth: k,
						insidePlotArea: !1
					}, this.sideFrame ? this.sideFrame.animate(a) :
						this.sideFrame = d.cuboid(a).attr({
							"class": "highcharts-3d-frame highcharts-3d-frame-side",
							zIndex: -2
						}).add()))
			}
		});
		g(l.prototype, "getPlotLinePath", function(b) {
			var a = b.apply(this, [].slice.call(arguments, 1));
			if(!this.chart.is3d() || null === a)return a;
			var d = this.chart, c = d.options.chart.options3d, d = this.isZAxis ? d.plotWidth : c.depth, c = this.opposite;
			this.horiz && (c = !c);
			a = [this.swapZ({x: a[1], y: a[2], z: c ? d : 0}), this.swapZ({x: a[1], y: a[2], z: d}), this.swapZ({
				x: a[4],
				y: a[5],
				z: d
			}), this.swapZ({x: a[4], y: a[5], z: c ? 0 : d})];
			a = n(a,
				this.chart, !1);
			return a = this.chart.renderer.toLinePath(a, !1)
		});
		g(l.prototype, "getLinePath", function(b) {
			return this.chart.is3d() ? [] : b.apply(this, [].slice.call(arguments, 1))
		});
		g(l.prototype, "getPlotBandPath", function(b) {
			if(!this.chart.is3d())return b.apply(this, [].slice.call(arguments, 1));
			var a = arguments, d = a[1], a = this.getPlotLinePath(a[2]);
			(d = this.getPlotLinePath(d)) && a ? d.push("L", a[10], a[11], "L", a[7], a[8], "L", a[4], a[5], "L", a[1], a[2]) : d = null;
			return d
		});
		g(c.prototype, "getMarkPath", function(b) {
			var a =
				b.apply(this, [].slice.call(arguments, 1));
			if(!this.axis.chart.is3d())return a;
			a = [this.axis.swapZ({x: a[1], y: a[2], z: 0}), this.axis.swapZ({x: a[4], y: a[5], z: 0})];
			a = n(a, this.axis.chart, !1);
			return a = ["M", a[0].x, a[0].y, "L", a[1].x, a[1].y]
		});
		g(c.prototype, "getLabelPosition", function(b) {
			var a = b.apply(this, [].slice.call(arguments, 1));
			this.axis.chart.is3d() && (a = n([this.axis.swapZ({x: a.x, y: a.y, z: 0})], this.axis.chart, !1)[0]);
			return a
		});
		b.wrap(l.prototype, "getTitlePosition", function(b) {
			var a = this.chart.is3d(), d, c;
			a && (c = this.axisTitleMargin, this.axisTitleMargin = 0);
			d = b.apply(this, [].slice.call(arguments, 1));
			a && (d = n([this.swapZ({
				x: d.x,
				y: d.y,
				z: 0
			})], this.chart, !1)[0], d[this.horiz ? "y" : "x"] += (this.horiz ? 1 : -1) * (this.opposite ? -1 : 1) * c, this.axisTitleMargin = c);
			return d
		});
		g(l.prototype, "drawCrosshair", function(b) {
			var a = arguments;
			this.chart.is3d() && a[2] && (a[2] = {plotX: a[2].plotXold || a[2].plotX, plotY: a[2].plotYold || a[2].plotY});
			b.apply(this, [].slice.call(a, 1))
		});
		l.prototype.swapZ = function(b, a) {
			if(this.isZAxis) {
				var d = a ? 0 :
					this.chart.plotLeft, c = this.chart;
				return {x: d + (c.yAxis[0].opposite ? b.z : c.xAxis[0].width - b.z), y: b.y, z: b.x - d}
			}
			return b
		};
		r = b.ZAxis = function() {
			this.isZAxis = !0;
			this.init.apply(this, arguments)
		};
		y(r.prototype, l.prototype);
		y(r.prototype, {
			setOptions: function(b) {
				b = h({offset: 0, lineWidth: 0}, b);
				l.prototype.setOptions.call(this, b);
				this.coll = "zAxis"
			}, setAxisSize: function() {
				l.prototype.setAxisSize.call(this);
				this.width = this.len = this.chart.options.chart.options3d.depth;
				this.right = this.chart.chartWidth - this.width - this.left
			},
			getSeriesExtremes: function() {
				var b = this, a = b.chart;
				b.hasVisibleSeries = !1;
				b.dataMin = b.dataMax = b.ignoreMinPadding = b.ignoreMaxPadding = null;
				b.buildStacks && b.buildStacks();
				t(b.series, function(d) {
					if(d.visible || !a.options.chart.ignoreHiddenSeries) b.hasVisibleSeries = !0, d = d.zData, d.length && (b.dataMin = Math.min(k(b.dataMin, d[0]), Math.min.apply(null, d)), b.dataMax = Math.max(k(b.dataMax, d[0]), Math.max.apply(null, d)))
				})
			}
		});
		g(p.prototype, "getAxes", function(b) {
			var a = this, d = this.options, d = d.zAxis = f(d.zAxis || {});
			b.call(this);
			a.is3d() && (this.zAxis = [], t(d, function(b, d) {
				b.index = d;
				b.isX = !0;
				(new r(a, b)).setScale()
			}))
		})
	})(u);
	(function(b) {
		function r(b) {
			if(this.chart.is3d()) {
				var f = this.chart.options.plotOptions.column.grouping;
				void 0 === f || f || void 0 === this.group.zIndex || this.zIndexSet || (this.group.attr({zIndex: 10 * this.group.zIndex}), this.zIndexSet = !0)
			}
			b.apply(this, [].slice.call(arguments, 1))
		}

		var l = b.each, p = b.perspective, t = b.pick, y = b.Series, h = b.seriesTypes, n = b.svg;
		b = b.wrap;
		b(h.column.prototype, "translate", function(b) {
			b.apply(this,
				[].slice.call(arguments, 1));
			if(this.chart.is3d()) {
				var f = this.chart, c = this.options, g = c.depth || 25, e = (c.stacking ? c.stack || 0 : this._i) * (g + (c.groupZPadding || 1));
				!1 !== c.grouping && (e = 0);
				e += c.groupZPadding || 1;
				l(this.data, function(a) {
					if(null !== a.y) {
						var b = a.shapeArgs, c = a.tooltipPos;
						a.shapeType = "cuboid";
						b.z = e;
						b.depth = g;
						b.insidePlotArea = !0;
						c = p([{x: c[0], y: c[1], z: e}], f, !0)[0];
						a.tooltipPos = [c.x, c.y]
					}
				});
				this.z = e
			}
		});
		b(h.column.prototype, "animate", function(b) {
			if(this.chart.is3d()) {
				var f = arguments[1], c = this.yAxis, g =
					this, e = this.yAxis.reversed;
				n && (f ? l(g.data, function(a) {
						null !== a.y && (a.height = a.shapeArgs.height, a.shapey = a.shapeArgs.y, a.shapeArgs.height = 1, e || (a.shapeArgs.y = a.stackY ? a.plotY + c.translate(a.stackY) : a.plotY + (a.negative ? -a.height : a.height)))
					}) : (l(g.data, function(a) {
						null !== a.y && (a.shapeArgs.height = a.height, a.shapeArgs.y = a.shapey, a.graphic && a.graphic.animate(a.shapeArgs, g.options.animation))
					}), this.drawDataLabels(), g.animate = null))
			} else b.apply(this, [].slice.call(arguments, 1))
		});
		b(h.column.prototype, "init",
			function(b) {
				b.apply(this, [].slice.call(arguments, 1));
				if(this.chart.is3d()) {
					var f = this.options, c = f.grouping, g = f.stacking, e = t(this.yAxis.options.reversedStacks, !0), a = 0;
					if(void 0 === c || c) {
						c = this.chart.retrieveStacks(g);
						a = f.stack || 0;
						for(g = 0; g < c[a].series.length && c[a].series[g] !== this; g++);
						a = 10 * (c.totalStacks - c[a].position) + (e ? g : -g);
						this.xAxis.reversed || (a = 10 * c.totalStacks - a)
					}
					f.zIndex = a
				}
			});
		b(y.prototype, "alignDataLabel", function(b) {
			if(this.chart.is3d() && ("column" === this.type || "columnrange" === this.type)) {
				var f =
					arguments[4], c = {x: f.x, y: f.y, z: this.z}, c = p([c], this.chart, !0)[0];
				f.x = c.x;
				f.y = c.y
			}
			b.apply(this, [].slice.call(arguments, 1))
		});
		h.columnrange && b(h.columnrange.prototype, "drawPoints", r);
		b(h.column.prototype, "drawPoints", r)
	})(u);
	(function(b) {
		var r = b.deg2rad, l = b.each, p = b.seriesTypes, t = b.svg;
		b = b.wrap;
		b(p.pie.prototype, "translate", function(b) {
			b.apply(this, [].slice.call(arguments, 1));
			if(this.chart.is3d()) {
				var h = this, n = h.options, k = n.depth || 0, f = h.chart.options.chart.options3d, c = f.alpha, g = f.beta, e = n.stacking ? (n.stack ||
					0) * k : h._i * k, e = e + k / 2;
				!1 !== n.grouping && (e = 0);
				l(h.data, function(a) {
					var b = a.shapeArgs;
					a.shapeType = "arc3d";
					b.z = e;
					b.depth = .75 * k;
					b.alpha = c;
					b.beta = g;
					b.center = h.center;
					b = (b.end + b.start) / 2;
					a.slicedTranslation = {
						translateX: Math.round(Math.cos(b) * n.slicedOffset * Math.cos(c * r)),
						translateY: Math.round(Math.sin(b) * n.slicedOffset * Math.cos(c * r))
					}
				})
			}
		});
		b(p.pie.prototype.pointClass.prototype, "haloPath", function(b) {
			var h = arguments;
			return this.series.chart.is3d() ? [] : b.call(this, h[1])
		});
		b(p.pie.prototype, "drawPoints", function(b) {
			b.apply(this,
				[].slice.call(arguments, 1));
			this.chart.is3d() && l(this.points, function(b) {
				var n = b.graphic;
				if(n) n[b.y && b.visible ? "show" : "hide"]()
			})
		});
		b(p.pie.prototype, "drawDataLabels", function(b) {
			if(this.chart.is3d()) {
				var h = this.chart.options.chart.options3d;
				l(this.data, function(b) {
					var k = b.shapeArgs, f = k.r, c = (k.start + k.end) / 2, g = b.labelPos, e = -f * (1 - Math.cos((k.alpha || h.alpha) * r)) * Math.sin(c), a = f * (Math.cos((k.beta || h.beta) * r) - 1) * Math.cos(c);
					l([0, 2, 4], function(b) {
						g[b] += a;
						g[b + 1] += e
					})
				})
			}
			b.apply(this, [].slice.call(arguments,
				1))
		});
		b(p.pie.prototype, "addPoint", function(b) {
			b.apply(this, [].slice.call(arguments, 1));
			this.chart.is3d() && this.update(this.userOptions, !0)
		});
		b(p.pie.prototype, "animate", function(b) {
			if(this.chart.is3d()) {
				var h = arguments[1], n = this.options.animation, k = this.center, f = this.group, c = this.markerGroup;
				t && (!0 === n && (n = {}), h ? (f.oldtranslateX = f.translateX, f.oldtranslateY = f.translateY, h = {
						translateX: k[0],
						translateY: k[1],
						scaleX: .001,
						scaleY: .001
					}, f.attr(h), c && (c.attrSetters = f.attrSetters, c.attr(h))) : (h = {
						translateX: f.oldtranslateX,
						translateY: f.oldtranslateY, scaleX: 1, scaleY: 1
					}, f.animate(h, n), c && c.animate(h, n), this.animate = null))
			} else b.apply(this, [].slice.call(arguments, 1))
		})
	})(u);
	(function(b) {
		var r = b.perspective, l = b.pick, p = b.seriesTypes;
		b = b.wrap;
		b(p.scatter.prototype, "translate", function(b) {
			b.apply(this, [].slice.call(arguments, 1));
			if(this.chart.is3d()) {
				var p = this.chart, h = l(this.zAxis, p.options.zAxis[0]), n = [], k, f, c;
				for(c = 0; c < this.data.length; c++)k = this.data[c], f = h.isLog && h.val2lin ? h.val2lin(k.z) : k.z, k.plotZ = h.translate(f), k.isInside =
					k.isInside ? f >= h.min && f <= h.max : !1, n.push({x: k.plotX, y: k.plotY, z: k.plotZ});
				p = r(n, p, !0);
				for(c = 0; c < this.data.length; c++)k = this.data[c], h = p[c], k.plotXold = k.plotX, k.plotYold = k.plotY, k.plotZold = k.plotZ, k.plotX = h.x, k.plotY = h.y, k.plotZ = h.z
			}
		});
		b(p.scatter.prototype, "init", function(b, l, h) {
			l.is3d() && (this.axisTypes = ["xAxis", "yAxis", "zAxis"], this.pointArrayMap = ["x", "y", "z"], this.parallelArrays = ["x", "y", "z"], this.directTouch = !0);
			b = b.apply(this, [l, h]);
			this.chart.is3d() && (this.tooltipOptions.pointFormat = this.userOptions.tooltip ?
				this.userOptions.tooltip.pointFormat || "x: <b>{point.x}</b><br/>y: <b>{point.y}</b><br/>z: <b>{point.z}</b><br/>" : "x: <b>{point.x}</b><br/>y: <b>{point.y}</b><br/>z: <b>{point.z}</b><br/>");
			return b
		})
	})(u)
});
