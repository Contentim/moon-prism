(function() {
	
	function c(a) {
		var b = !1;
		return function() {
			if (b) throw Error("Callback was already called.");
			b = !0;
			a.apply(g, arguments)
		}
	}
	var a = {},
		g, l;
	g = this;
	null != g && (l = g.async);
	a.noConflict = function() {
		g.async = l;
		return a
	};
	var q = Object.prototype.toString,
		n = Array.isArray || function(a) {
			return "[object Array]" === q.call(a)
		},
		k = function(a, b) {
			if (a.forEach) return a.forEach(b);
			for (var d = 0; d < a.length; d += 1) b(a[d], d, a)
		},
		s = function(a, b) {
			if (a.map) return a.map(b);
			var d = [];
			k(a, function(a, h, x) {
				d.push(b(a, h, x))
			});
			return d
		},
		v = function(a, b, d) {
			if (a.reduce) return a.reduce(b, d);
			k(a, function(a, h, x) {
				d = b(d, a, h, x)
			});
			return d
		},
		p = function(a) {
			if (Object.keys) return Object.keys(a);
			var b = [],
				d;
			for (d in a) a.hasOwnProperty(d) && b.push(d);
			return b
		};
	"undefined" !== typeof process && process.nextTick ? (a.nextTick = process.nextTick, a.setImmediate = "undefined" !== typeof setImmediate ? function(a) {
		setImmediate(a)
	} : a.nextTick) : (a.nextTick = "function" === typeof setImmediate ? function(a) {
		setImmediate(a)
	} : function(a) {
		setTimeout(a, 0)
	}, a.setImmediate = a.nextTick);
	a.each = function(a, b, d) {
		function e(b) {
			b ? (d(b), d = function() {}) : (f += 1, f >= a.length && d())
		}
		d = d || function() {};
		if (!a.length) return d();
		var f = 0;
		k(a, function(a) {
			b(a, c(e))
		})
	};
	a.forEach = a.each;
	a.eachSeries = function(a, b, d) {
		d = d || function() {};
		if (!a.length) return d();
		var e = 0,
			f = function() {
				b(a[e], function(b) {
					b ? (d(b), d = function() {}) : (e += 1, e >= a.length ? d() : f())
				})
			};
		f()
	};
	a.forEachSeries = a.eachSeries;
	a.eachLimit = function(a, b, d, e) {
		u(b).apply(null, [a, d, e])
	};
	a.forEachLimit = a.eachLimit;
	var u = function(a) {
			return function(b, d, e) {
				e = e || function() {};
				if (!b.length || 0 >= a) return e();
				var f = 0,
					x = 0,
					w = 0;
				(function B() {
					if (f >= b.length) return e();
					for (; w < a && x < b.length;) x += 1, w += 1, d(b[x - 1], function(a) {
						a ? (e(a), e = function() {}) : (f += 1, w -= 1, f >= b.length ? e() : B())
					})
				})()
			}
		},
		r = function(h) {
			return function() {
				var b = Array.prototype.slice.call(arguments);
				return h.apply(null, [a.each].concat(b))
			}
		},
		y = function(a, b) {
			return function() {
				var d = Array.prototype.slice.call(arguments);
				return b.apply(null, [u(a)].concat(d))
			}
		},
		t = function(h) {
			return function() {
				var b = Array.prototype.slice.call(arguments);
				return h.apply(null, [a.eachSeries].concat(b))
			}
		},
		z = function(a, b, d, e) {
			b = s(b, function(a, b) {
				return {
					index: b,
					value: a
				}
			});
			if (e) {
				var f = [];
				a(b, function(a, b) {
					d(a.value, function(d, e) {
						f[a.index] = e;
						b(d)
					})
				}, function(a) {
					e(a, f)
				})
			} else a(b, function(a, b) {
				d(a.value, function(a) {
					b(a)
				})
			})
		};
	a.map = r(z);
	a.mapSeries = t(z);
	a.mapLimit = function(a, b, d, e) {
		return y(b, z)(a, d, e)
	};
	a.reduce = function(h, b, d, e) {
		a.eachSeries(h, function(a, e) {
			d(b, a, function(a, d) {
				b = d;
				e(a)
			})
		}, function(a) {
			e(a, b)
		})
	};
	a.inject = a.reduce;
	a.foldl = a.reduce;
	a.reduceRight = function(h, b, d, e) {
		h = s(h, function(a) {
			return a
		}).reverse();
		a.reduce(h, b, d, e)
	};
	a.foldr = a.reduceRight;
	var m = function(a, b, d, e) {
		var f = [];
		b = s(b, function(a, b) {
			return {
				index: b,
				value: a
			}
		});
		a(b, function(a, b) {
			d(a.value, function(d) {
				d && f.push(a);
				b()
			})
		}, function(a) {
			e(s(f.sort(function(a, b) {
				return a.index - b.index
			}), function(a) {
				return a.value
			}))
		})
	};
	a.filter = r(m);
	a.filterSeries = t(m);
	a.select = a.filter;
	a.selectSeries = a.filterSeries;
	m = function(a, b, d, e) {
		var f = [];
		b = s(b, function(a, b) {
			return {
				index: b,
				value: a
			}
		});
		a(b, function(a, b) {
			d(a.value, function(d) {
				d || f.push(a);
				b()
			})
		}, function(a) {
			e(s(f.sort(function(a, b) {
				return a.index - b.index
			}), function(a) {
				return a.value
			}))
		})
	};
	a.reject = r(m);
	a.rejectSeries = t(m);
	m = function(a, b, d, e) {
		a(b, function(a, b) {
			d(a, function(d) {
				d ? (e(a), e = function() {}) : b()
			})
		}, function(a) {
			e()
		})
	};
	a.detect = r(m);
	a.detectSeries = t(m);
	a.some = function(h, b, d) {
		a.each(h, function(a, f) {
			b(a, function(a) {
				a && (d(!0), d = function() {});
				f()
			})
		}, function(a) {
			d(!1)
		})
	};
	a.any = a.some;
	a.every = function(h, b, d) {
		a.each(h, function(a, f) {
			b(a, function(a) {
				a || (d(!1), d = function() {});
				f()
			})
		}, function(a) {
			d(!0)
		})
	};
	a.all = a.every;
	a.sortBy = function(h, b, d) {
		a.map(h, function(a, d) {
			b(a, function(b, h) {
				b ? d(b) : d(null, {
					value: a,
					criteria: h
				})
			})
		}, function(a, b) {
			if (a) return d(a);
			d(null, s(b.sort(function(a, b) {
				var d = a.criteria,
					e = b.criteria;
				return d < e ? -1 : d > e ? 1 : 0
			}), function(a) {
				return a.value
			}))
		})
	};
	a.auto = function(h, b) {
		b = b || function() {};
		var d = p(h),
			e = d.length;
		if (!e) return b();
		var f = {},
			c = [],
			w = function(a) {
				c.unshift(a)
			},
			r = function() {
				e--;
				k(c.slice(0), function(a) {
					a()
				})
			};
		w(function() {
			if (!e) {
				var a = b;
				b = function() {};
				a(null, f)
			}
		});
		k(d, function(d) {
			var e = n(h[d]) ? h[d] : [h[d]],
				g = function(e) {
					var h = Array.prototype.slice.call(arguments, 1);
					1 >= h.length && (h = h[0]);
					if (e) {
						var c = {};
						k(p(f), function(a) {
							c[a] = f[a]
						});
						c[d] = h;
						b(e, c);
						b = function() {}
					} else f[d] = h, a.setImmediate(r)
				},
				y = e.slice(0, Math.abs(e.length - 1)) || [],
				t = function() {
					return v(y, function(a, b) {
						return a && f.hasOwnProperty(b)
					}, !0) && !f.hasOwnProperty(d)
				};
			if (t()) e[e.length - 1](g, f);
			else {
				var m = function() {
					if (t()) {
						var a = m,
							b = 0;
						a: for (; b < c.length; b += 1)
							if (c[b] === a) {
								c.splice(b, 1);
								break a
							}
						e[e.length - 1](g, f)
					}
				};
				w(m)
			}
		})
	};
	a.retry = function(h, b, d) {
		var e = [];
		"function" === typeof h && (d = b, b = h, h = 5);
		h = parseInt(h, 10) || 5;
		var f = function(f, c) {
			for (var r = function(a, b) {
					return function(d) {
						a(function(a, e) {
							d(!a || b, {
								err: a,
								result: e
							})
						}, c)
					}
				}; h;) e.push(r(b, !(h -= 1)));
			a.series(e, function(a, b) {
				b = b[b.length - 1];
				(f || d)(b.err, b.result)
			})
		};
		return d ? f() : f
	};
	a.waterfall = function(h, b) {
		b = b || function() {};
		if (!n(h)) return b(Error("First argument to waterfall must be an array of functions"));
		if (!h.length) return b();
		var d = function(e) {
			return function(f) {
				if (f) b.apply(null, arguments), b = function() {};
				else {
					var h = Array.prototype.slice.call(arguments, 1),
						c = e.next();
					c ? h.push(d(c)) : h.push(b);
					a.setImmediate(function() {
						e.apply(null, h)
					})
				}
			}
		};
		d(a.iterator(h))()
	};
	var A = function(a, b, d) {
		d = d || function() {};
		if (n(b)) a.map(b, function(a, b) {
			a && a(function(a) {
				var d = Array.prototype.slice.call(arguments, 1);
				1 >= d.length && (d = d[0]);
				b.call(null, a, d)
			})
		}, d);
		else {
			var e = {};
			a.each(p(b), function(a, d) {
				b[a](function(b) {
					var h = Array.prototype.slice.call(arguments, 1);
					1 >= h.length && (h = h[0]);
					e[a] = h;
					d(b)
				})
			}, function(a) {
				d(a, e)
			})
		}
	};
	a.parallel = function(h, b) {
		A({
			map: a.map,
			each: a.each
		}, h, b)
	};
	a.parallelLimit = function(a, b, d) {
		A({
			map: y(b, z),
			each: u(b)
		}, a, d)
	};
	a.series = function(h, b) {
		b = b || function() {};
		if (n(h)) a.mapSeries(h, function(a, b) {
			a && a(function(a) {
				var d = Array.prototype.slice.call(arguments, 1);
				1 >= d.length && (d = d[0]);
				b.call(null, a, d)
			})
		}, b);
		else {
			var d = {};
			a.eachSeries(p(h), function(a, b) {
				h[a](function(h) {
					var c = Array.prototype.slice.call(arguments, 1);
					1 >= c.length && (c = c[0]);
					d[a] = c;
					b(h)
				})
			}, function(a) {
				b(a, d)
			})
		}
	};
	a.iterator = function(a) {
		var b = function(d) {
			var e = function() {
				a.length && a[d].apply(null, arguments);
				return e.next()
			};
			e.next = function() {
				return d < a.length - 1 ? b(d + 1) : null
			};
			return e
		};
		return b(0)
	};
	a.apply = function(a) {
		var b = Array.prototype.slice.call(arguments, 1);
		return function() {
			return a.apply(null, b.concat(Array.prototype.slice.call(arguments)))
		}
	};
	m = function(a, b, d, e) {
		var c = [];
		a(b, function(a, b) {
			d(a, function(a, d) {
				c = c.concat(d || []);
				b(a)
			})
		}, function(a) {
			e(a, c)
		})
	};
	a.concat = r(m);
	a.concatSeries = t(m);
	a.whilst = function(c, b, d) {
		c() ? b(function(e) {
			if (e) return d(e);
			a.whilst(c, b, d)
		}) : d()
	};
	a.doWhilst = function(c, b, d) {
		c(function(e) {
			if (e) return d(e);
			var f = Array.prototype.slice.call(arguments, 1);
			b.apply(null, f) ? a.doWhilst(c, b, d) : d()
		})
	};
	a.until = function(c, b, d) {
		c() ? d() : b(function(e) {
			if (e) return d(e);
			a.until(c, b, d)
		})
	};
	a.doUntil = function(c, b, d) {
		c(function(e) {
			if (e) return d(e);
			var f = Array.prototype.slice.call(arguments, 1);
			b.apply(null, f) ? d() : a.doUntil(c, b, d)
		})
	};
	a.queue = function(h, b) {
		function d(b, d, c, e) {
			b.started || (b.started = !0);
			n(d) || (d = [d]);
			if (0 == d.length) return a.setImmediate(function() {
				b.drain && b.drain()
			});
			k(d, function(d) {
				d = {
					data: d,
					callback: "function" === typeof e ? e : null
				};
				c ? b.tasks.unshift(d) : b.tasks.push(d);
				b.saturated && b.tasks.length === b.concurrency && b.saturated();
				a.setImmediate(b.process)
			})
		}
		void 0 === b && (b = 1);
		var e = 0,
			f = {
				tasks: [],
				concurrency: b,
				saturated: null,
				empty: null,
				drain: null,
				started: !1,
				paused: !1,
				push: function(a, b) {
					d(f, a, !1, b)
				},
				kill: function() {
					f.drain = null;
					f.tasks = []
				},
				unshift: function(a, b) {
					d(f, a, !0, b)
				},
				process: function() {
					if (!f.paused && e < f.concurrency && f.tasks.length) {
						var a = f.tasks.shift();
						f.empty && 0 === f.tasks.length && f.empty();
						e += 1;
						var b = c(function() {
							e -= 1;
							a.callback && a.callback.apply(a, arguments);
							f.drain && 0 === f.tasks.length + e && f.drain();
							f.process()
						});
						h(a.data, b)
					}
				},
				length: function() {
					return f.tasks.length
				},
				running: function() {
					return e
				},
				idle: function() {
					return 0 === f.tasks.length + e
				},
				pause: function() {
					!0 !== f.paused && (f.paused = !0)
				},
				resume: function() {
					if (!1 !== f.paused) {
						f.paused = !1;
						for (var b = 1; b <= f.concurrency; b++) a.setImmediate(f.process)
					}
				}
			};
		return f
	};
	a.priorityQueue = function(c, b) {
		function d(a, b) {
			return a.priority - b.priority
		}

		function e(a, b, d) {
			for (var c = -1, e = a.length - 1; c < e;) {
				var f = c + (e - c + 1 >>> 1);
				0 <= d(b, a[f]) ? c = f : e = f - 1
			}
			return c
		}

		function f(b, c, f, h) {
			b.started || (b.started = !0);
			n(c) || (c = [c]);
			if (0 == c.length) return a.setImmediate(function() {
				b.drain && b.drain()
			});
			k(c, function(c) {
				c = {
					data: c,
					priority: f,
					callback: "function" === typeof h ? h : null
				};
				b.tasks.splice(e(b.tasks, c, d) + 1, 0, c);
				b.saturated && b.tasks.length === b.concurrency && b.saturated();
				a.setImmediate(b.process)
			})
		}
		var r = a.queue(c, b);
		r.push = function(a, b, d) {
			f(r, a, b, d)
		};
		delete r.unshift;
		return r
	};
	a.cargo = function(c, b) {
		var d = !1,
			e = [],
			f = {
				tasks: e,
				payload: b,
				saturated: null,
				empty: null,
				drain: null,
				drained: !0,
				push: function(d, c) {
					n(d) || (d = [d]);
					k(d, function(a) {
						e.push({
							data: a,
							callback: "function" === typeof c ? c : null
						});
						f.drained = !1;
						f.saturated && e.length === b && f.saturated()
					});
					a.setImmediate(f.process)
				},
				process: function w() {
					if (!d)
						if (0 === e.length) f.drain && !f.drained && f.drain(),
							f.drained = !0;
						else {
							var a = "number" === typeof b ? e.splice(0, b) : e.splice(0, e.length),
								r = s(a, function(a) {
									return a.data
								});
							f.empty && f.empty();
							d = !0;
							c(r, function() {
								d = !1;
								var b = arguments;
								k(a, function(a) {
									a.callback && a.callback.apply(null, b)
								});
								w()
							})
						}
				},
				length: function() {
					return e.length
				},
				running: function() {
					return d
				}
			};
		return f
	};
	m = function(a) {
		return function(b) {
			var d = Array.prototype.slice.call(arguments, 1);
			b.apply(null, d.concat([function(b) {
				var d = Array.prototype.slice.call(arguments, 1);
				"undefined" !== typeof console && (b ? console.error && console.error(b) : console[a] && k(d, function(b) {
					console[a](b)
				}))
			}]))
		}
	};
	a.log = m("log");
	a.dir = m("dir");
	a.memoize = function(c, b) {
		var d = {},
			e = {};
		b = b || function(a) {
			return a
		};
		var f = function() {
			var f = Array.prototype.slice.call(arguments),
				r = f.pop(),
				g = b.apply(null, f);
			g in d ? a.nextTick(function() {
				r.apply(null, d[g])
			}) : g in e ? e[g].push(r) : (e[g] = [r], c.apply(null, f.concat([function() {
				d[g] = arguments;
				var a = e[g];
				delete e[g];
				for (var b = 0, c = a.length; b < c; b++) a[b].apply(null, arguments)
			}])))
		};
		f.memo = d;
		f.unmemoized = c;
		return f
	};
	a.unmemoize = function(a) {
		return function() {
			return (a.unmemoized || a).apply(null, arguments)
		}
	};
	a.times = function(c, b, d) {
		for (var e = [], f = 0; f < c; f++) e.push(f);
		return a.map(e, b, d)
	};
	a.timesSeries = function(c, b, d) {
		for (var e = [], f = 0; f < c; f++) e.push(f);
		return a.mapSeries(e, b, d)
	};
	a.seq = function() {
		var c = arguments;
		return function() {
			var b = this,
				d = Array.prototype.slice.call(arguments),
				e = d.pop();
			a.reduce(c, d, function(a, d, c) {
				d.apply(b, a.concat([function() {
					var a = arguments[0],
						b = Array.prototype.slice.call(arguments, 1);
					c(a, b)
				}]))
			}, function(a, d) {
				e.apply(b, [a].concat(d))
			})
		}
	};
	a.compose = function() {
		return a.seq.apply(null, Array.prototype.reverse.call(arguments))
	};
	m = function(a, b) {
		var d = function() {
			var d = this,
				c = Array.prototype.slice.call(arguments),
				e = c.pop();
			return a(b, function(a, b) {
				a.apply(d, c.concat([b]))
			}, e)
		};
		if (2 < arguments.length) {
			var c = Array.prototype.slice.call(arguments, 2);
			return d.apply(this, c)
		}
		return d
	};
	a.applyEach = r(m);
	a.applyEachSeries = t(m);
	a.forever = function(a, b) {
		function d(c) {
			if (c) {
				if (b) return b(c);
				throw c;
			}
			a(d)
		}
		d()
	};
	"undefined" !== typeof module && module.exports ? module.exports = a : "undefined" !== typeof define && define.amd ? define([], function() {
		return a
	}) : g.async = a
})();

var poly = [
		[55.77682929150693, 37.8427186924053],
		[55.77271261339107, 37.843152686304705],
		[55.738276896644805, 37.84134161820584],
		[55.71399689835854, 37.83813880871875],
		[55.699921267680175, 37.83078428272048],
		[55.6962950504132, 37.82954151435689],
		[55.6928207993758, 37.82931794772561],
		[55.6892209716432, 37.829854389528585],
		[55.66165146026852, 37.83966290527148],
		[55.658376283618054, 37.8394483285503],
		[55.65605007409182, 37.838791290011436],
		[55.6531141363056, 37.8370746762419],
		[55.65145113826342, 37.83568956934368],
		[55.64812656859308, 37.8314409502641],
		[55.644824797922006, 37.82628977266418],
		[55.625585595616016, 37.79678983996685],
		[55.62124956968963, 37.78912615774818],
		[55.60391627214637, 37.75711862597196],
		[55.59919459324873, 37.74706053825473],
		[55.59180719241245, 37.72946947797549],
		[55.588836348363664, 37.7225364780563],
		[55.575884202346515, 37.68793829096614],
		[55.57326575851499, 37.679926824757885],
		[55.57229316496271, 37.67458386440024],
		[55.571916278457984, 37.66924090404256],
		[55.57203486325925, 37.66469310778763],
		[55.576012618166274,
			37.59661654265479
		],
		[55.576997275315456, 37.58977417112674],
		[55.593461027106216, 37.52076943829923],
		[55.5950406236937, 37.51480420545011],
		[55.59619490389248, 37.51175721600919],
		[55.597166902872914, 37.509675821813644],
		[55.59866130413232, 37.50692923978237],
		[55.59992481831982, 37.505169710668625],
		[55.60066420884299, 37.50419141558768],
		[55.61116763612223, 37.491928885586624],
		[55.638875974823236, 37.459586882490854],
		[55.659861822998046, 37.43484779763937],
		[55.66403637567329, 37.43088149929608],
		[55.68274170580392,
			37.41690766704496
		],
		[55.68445104083821, 37.41598498714383],
		[55.68864009415873, 37.41437258409716],
		[55.69086356292832, 37.41284823307507],
		[55.69271798296722, 37.41115307697766],
		[55.694411609835676, 37.40906103948314],
		[55.69633857479258, 37.40646466115671],
		[55.70821582138647, 37.39042283284293],
		[55.709960382334486, 37.388470184680074],
		[55.71100223559, 37.387526047106846],
		[55.714297215701556, 37.38550902592765],
		[55.74299678995391, 37.37085040270776],
		[55.74737891548303, 37.3693383084583],
		[55.749835763080554, 37.36897352803228],
		[55.78212184948561, 37.36975523402037],
		[55.78471424142089, 37.370104443868414],
		[55.7865400068638, 37.370812547048324],
		[55.789647237893845, 37.37287248357179],
		[55.80029924148098, 37.38296043585071],
		[55.804902293956964, 37.38656302639442],
		[55.80873309836682, 37.38838692852456],
		[55.83469933158447, 37.39616684582014],
		[55.838100191970035, 37.39588770506112],
		[55.84068411346117, 37.394943567487864],
		[55.844347068377, 37.39240249367216],
		[55.84601308639975, 37.391908967213396],
		[55.847449667553015, 37.39193042488553],
		[55.84921212285334,
			37.39242395134426
		],
		[55.85763645302826, 37.39690455309926],
		[55.860737839006916, 37.39879032715197],
		[55.862584159418496, 37.40035673721667],
		[55.864949251589444, 37.40273853882189],
		[55.86706126571094, 37.40537841047629],
		[55.869498474258364, 37.40936953749045],
		[55.871054829060206, 37.412373611587114],
		[55.87204410730281, 37.41473395552023],
		[55.87320337129219, 37.41764120434771],
		[55.875543687912774, 37.424979728212456],
		[55.8813305362832, 37.44392953059815],
		[55.88207002762898, 37.44778576813208],
		[55.882588650864065,
			37.452763948063726
		],
		[55.88275750343904, 37.46081057510839],
		[55.88292635527642, 37.464286717991705],
		[55.883384663688354, 37.46735516510474],
		[55.88551934442368, 37.47628155670629],
		[55.888075982000466, 37.48647395096288],
		[55.88926982558072, 37.49010029755102],
		[55.89215178082288, 37.496623429875235],
		[55.904441104424826, 37.52475156556294],
		[55.90586346265124, 37.529643914806094],
		[55.90676747666915, 37.53442897568867],
		[55.90726166205295, 37.538141152965274],
		[55.910865408147124, 37.57275237809345],
		[55.911022085130945,
			37.57652892838642
		],
		[55.91097387689595, 37.579554460155215],
		[55.91063641756565, 37.58356704484148],
		[55.90998559481434, 37.587579629527774],
		[55.9092021825094, 37.5910986877553],
		[55.90847901858254, 37.593480489360545],
		[55.901901172883115, 37.6180182383294],
		[55.89891144249577, 37.63301715114069],
		[55.89687395332799, 37.64762982585381],
		[55.89576474245468, 37.659367172502996],
		[55.89456572248885, 37.69416117435827],
		[55.89393874366838, 37.699139354289926],
		[55.89328763950915, 37.70195030933754],
		[55.89247977280019, 37.70471834904089],
		[55.89140661030458, 37.70757221943274],
		[55.880130573679516, 37.73042464023962],
		[55.8304865952908, 37.8268977445699],
		[55.829001074066674, 37.82968724194538],
		[55.82757588633297, 37.831725720796705],
		[55.82488607061184, 37.834775327717445],
		[55.822361493423664, 37.836706518208175],
		[55.82024748644772, 37.8376291981093],
		[55.816165064041414, 37.83857287182817],
		[55.81242284003345, 37.83903585464755],
		[55.803139424516395, 37.839775801016756],
		[55.77682929150693, 37.8427186924053]
	],
	b_junctions = [
		[55.77682626803085, 37.84269989967345],
		[55.76903191638017, 37.84318651588698],
		[55.74392477931212, 37.84185519957153],
		[55.73052122580085, 37.84037898416108],
		[55.71863531207276, 37.83895012458452],
		[55.711831272333605, 37.83713368900962],
		[55.707901422046966, 37.8350106548768],
		[55.6869523798766, 37.83057993978087],
		[55.65692789667629, 37.83910426510268],
		[55.640528720308474, 37.819652386266085],
		[55.617789410062215, 37.782276430404394],
		[55.59175631830074, 37.72929474857808],
		[55.57581125568298, 37.687799514747375],
		[55.57272629492449, 37.65277241112271],
		[55.57605719591829,
			37.59643530860042
		],
		[55.58106457666858, 37.57265144016032],
		[55.59150701569656, 37.52902190629794],
		[55.61120819157864, 37.49189413873337],
		[55.638972144200956, 37.45948542596951],
		[55.66189360804507, 37.432824164364256],
		[55.68278581583797, 37.416807425418966],
		[55.668026850906536, 37.42778473861195],
		[55.70188946767468, 37.39895204348993],
		[55.713602586285944, 37.38589295731531],
		[55.72348037785042, 37.38078139017449],
		[55.73175585229489, 37.37657178200628],
		[55.76508406345848, 37.36928736556715],
		[55.76996256764349, 37.36942982797446],
		[55.789736950483615, 37.3728868615282],
		[55.808798087528174, 37.388344151047676],
		[55.83260998737753, 37.39560097816893],
		[55.851747102850375, 37.39376480087579],
		[55.87090570963696, 37.41209100527676],
		[55.87659696295345, 37.42839459978549],
		[55.88161130650381, 37.445221243317135],
		[55.88711708090231, 37.482644383447834],
		[55.89207427475143, 37.49649435563702],
		[55.90782224163112, 37.54371914983502],
		[55.90978840669936, 37.58858112800599],
		[55.89518876022445, 37.67325996719509],
		[55.82959228057486, 37.82861019557688],
		[55.8822323534685,
			37.72592724800108
		],
		[55.8138082895938, 37.83884777073161]
	],
	s_junctions = [
		[55.75481214376632, 37.84267307758329],
		[55.70418787329251, 37.8332852107992],
		[55.702989401989484, 37.83263932754],
		[55.65047653581307, 37.83493949978359],
		[55.64502320468091, 37.82690675054945],
		[55.62614603220174, 37.798215117726585],
		[55.59582667642601, 37.73945441049923],
		[55.587464115886156, 37.71946951925047],
		[55.58141301775248, 37.70325579370606],
		[55.57362538548569, 37.63521054231301],
		[55.57456040522403, 37.619314897938175],
		[55.58056831268785,
			37.573856505131964
		],
		[55.58749528969654, 37.5451094875984],
		[55.593784581287494, 37.51884952838902],
		[55.60589190143268, 37.49776326563821],
		[55.61577037337298, 37.48617693805733],
		[55.62588555827154, 37.47443845687327],
		[55.63159809915896, 37.46778063484318],
		[55.65207693603693, 37.4436689941094],
		[55.65663799228618, 37.43816060545844],
		[55.66590855944432, 37.42912931533752],
		[55.68849971417, 37.4141437197791],
		[55.707656747292155, 37.39082356976081],
		[55.70992858606593, 37.38822422159842],
		[55.75188787932283, 37.366333001041205],
		[55.79604144033229, 37.37852370112031],
		[55.81331234523823, 37.38954092451],
		[55.81568484607161, 37.390191395766784],
		[55.82131114715086, 37.391900629017584],
		[55.825072975139875, 37.393084859162826],
		[55.830495842317646, 37.39451898008863],
		[55.8339338725267, 37.39594735722236],
		[55.85865656090271, 37.397073365517734],
		[55.86699779674642, 37.40492948497198],
		[55.87821893534327, 37.43308640028372],
		[55.88949415675149, 37.48972351315925],
		[55.90681458164319, 37.53369071576891],
		[55.910830265189425, 37.57059586873433],
		[55.911011046432726,
			37.581529228009686
		],
		[55.89964948588706, 37.629701188337705],
		[55.895716922397085, 37.66346711671403],
		[55.89505379117015, 37.68453970149422],
		[55.894105661911894, 37.699083186567655],
		[55.89178148825972, 37.70718435431336],
		[55.87839320587734, 37.734177892950065],
		[55.82543390489343, 37.83464260085545],
		[55.81012946042399, 37.83951226232321],
		[55.80418173177062, 37.83998433110984],
		[55.802423269353746, 37.840209636667076],
		[55.90738403567146, 37.5979956303702]
	];

function pegasus(c, a) {
	return a = new XMLHttpRequest, a.open("GET", c), c = [], a.onreadystatechange = a.then = function(g, l, q) {
		g.call && (c = [, g, l]);
		4 == a.readyState && (q = c[0 | a.status / 200], q && q(JSON.parse(a.responseText), a))
	}, a.send(), a
};
(function() {
	function c(a, g, t) {
		if ("_root" == g) return t;
		if (a !== t) {
			if ((k ? k : a.matches ? k = a.matches : a.webkitMatchesSelector ? k = a.webkitMatchesSelector : a.mozMatchesSelector ? k = a.mozMatchesSelector : a.msMatchesSelector ? k = a.msMatchesSelector : a.oMatchesSelector ? k = a.oMatchesSelector : k = n.matchesSelector).call(a, g)) return a;
			if (a.parentNode) return s++, c(a.parentNode, g, t)
		}
	}

	function a(a, c, g, k) {
		p[a.id] || (p[a.id] = {});
		p[a.id][c] || (p[a.id][c] = {});
		p[a.id][c][g] || (p[a.id][c][g] = []);
		p[a.id][c][g].push(k)
	}

	function g(a, c, g, k) {
		if (p[a.id])
			if (!c)
				for (var m in p[a.id]) p[a.id].hasOwnProperty(m) && (p[a.id][m] = {});
			else if (!k && !g) p[a.id][c] = {};
		else if (!k) delete p[a.id][c][g];
		else if (p[a.id][c][g])
			for (m = 0; m < p[a.id][c][g].length; m++)
				if (p[a.id][c][g][m] === k) {
					p[a.id][c][g].splice(m, 1);
					break
				}
	}

	function l(a, g, k) {
		if (p[a][k]) {
			var q = g.target || g.srcElement,
				m, l, h = {},
				b = l = 0;
			s = 0;
			for (m in p[a][k]) p[a][k].hasOwnProperty(m) && (l = c(q, m, u[a].element)) && n.matchesEvent(k, u[a].element, l, "_root" == m, g) && (s++, p[a][k][m].match = l, h[s] = p[a][k][m]);
			g.stopPropagation = function() {
				g.cancelBubble = !0
			};
			for (l = 0; l <= s; l++)
				if (h[l])
					for (b = 0; b < h[l].length; b++) {
						if (!1 === h[l][b].call(h[l].match, g)) {
							n.cancel(g);
							return
						}
						if (g.cancelBubble) return
					}
		}
	}

	function q(c, k, q, s) {
		function m(a) {
			return function(d) {
				l(v, d, a)
			}
		}
		if (this.element) {
			c instanceof Array || (c = [c]);
			q || "function" != typeof k || (q = k, k = "_root");
			var v = this.id,
				h;
			for (h = 0; h < c.length; h++) s ? g(this, c[h], k, q) : (p[v] && p[v][c[h]] || n.addEvent(this, c[h], m(c[h])), a(this, c[h], k, q));
			return this
		}
	}

	function n(a, c) {
		if (!(this instanceof n)) {
			for (var g in u)
				if (u[g].element === a) return u[g];
			v++;
			u[v] = new n(a, v);
			return u[v]
		}
		this.element = a;
		this.id = c
	}
	var k, s = 0,
		v = 0,
		p = {},
		u = {};
	n.prototype.on = function(a, c, g) {
		return q.call(this, a, c, g)
	};
	n.prototype.off = function(a, c, g) {
		return q.call(this, a, c, g, !0)
	};
	n.matchesSelector = function() {};
	n.cancel = function(a) {
		a.preventDefault();
		a.stopPropagation()
	};
	n.addEvent = function(a, c, g) {
		a.element.addEventListener(c, g, "blur" == c || "focus" == c)
	};
	n.matchesEvent = function() {
		return !0
	};
	window.Gator = n
})();

var myMap = null,
	mkad_poly = null,
	bjGq = null,
	jGq = null,
	collection = null,
	searchControl = null;

ymaps.ready(init);

function init() {
	document.getElementById("loading-text").innerHTML = "Рассчитываю расстояние и цену";
	layout.hideLoading();

	myMap = new ymaps.Map("ya_map", {
		center: [55.75119082121071, 37.61699737548825],
		zoom: 10,
		controls: ["zoomControl", "typeSelector"]
	}, {
        balloonMaxWidth: 300,
        searchControlProvider: 'yandex#search'
    });

	collection = new ymaps.GeoObjectCollection({});
	myMap.geoObjects.add(collection);
	prepareData();
	myMap.events.add("click", function(a) {
		a = a.get("coords");
		getDistance(a);
/*
		console.log(a[0].toPrecision(6));
		console.log(a[1].toPrecision(6));
		// var crds = a.get('coords');
		// console.log(crds);

		myPlacemark0 = new ymaps.Placemark([a[0].toPrecision(6),a[1].toPrecision(6)], { // Создаем метку с такими координатами и суем в переменную
		        balloonContent: 'Заголовок метки 1Немного инфы о том, о сем. Лорем ипсум чото там.' // сдесь содержимое балуна в формате html, все стили в css
			}, {
			iconImageHref: 'http://dontforget.pro/examples/yamap/img/icon1.png', // картинка иконки
			iconImageSize: [64, 64], // размер иконки
			iconImageOffset: [-32, -64], // позиция иконки
			balloonContentSize: [270, 99], // размер нашего кастомного балуна в пикселях
			balloonLayout: "default#imageWithContent", // указываем что содержимое балуна кастомная херь
			balloonImageHref: 'http://dontforget.pro/examples/yamap/img/ballon2.png', // Картинка заднего фона балуна
			balloonImageOffset: [-65, -89], // смещание балуна, надо подогнать под стрелочку
			balloonImageSize: [260, 89], // размер картинки-бэкграунда балуна
			balloonShadow: false
		});
		///Добавляем метки на карту
		myMap.geoObjects
			.add(myPlacemark0);*/
	});

	initSearchControls();
	var c = checkSavedUrl();
	if (c) loadSavedUrl(c);
	else {
		var a = checkSearchUrl();
		a && a.length && setTimeout(function() {
			searchControl.search(a)
		}, 500)
	}

}

function checkSearchUrl() {
	var c = /\/s\/(.*?)$/.exec(location.pathname);
	if (c) return decodeURIComponent(c[1]);
	if (location.search) {
		var a = {};
		location.search.replace(/^\?/, "").split("&").forEach(function(c) {
			c = c.split("=");
			a[c[0]] = c[1]
		});
		if (a.s) return decodeURIComponent(a.s)
	}
	return null
}

function loadSavedUrl(c) {
	var a = document.getElementById("loading-text");
	a.innerHTML = "\u0417\u0430\u0433\u0440\u0443\u0436\u0430\u044e..";
	layout.showLoading();
	api.loadCoords(c, function(g) {
		g ? (document.getElementById("link-value").value = layout.url + c, getRoute([g.lat_mkad, g.lon_mkad], [g.lat, g.lon], function(a, c) {
			showResults(c, [g.lat, g.lon], !0)
		})) : layout.showMessage("\u041c\u0430\u0440\u0448\u0440\u0443\u0442 \u043d\u0435 \u043d\u0430\u0439\u0434\u0435\u043d");
		layout.hideLoading();
		a.innerHTML = "\u0418\u0437\u043c\u0435\u0440\u044f\u044e..."
	})
}

function checkSavedUrl() {
	var c = /\/m\/([\w\d]+)/.exec(location.pathname);
	return c ? c[1] : null
}

function initSearchControls() {
	var c = new ymaps.control.SearchControl({
		options: {
			noPlacemark: !0,
			boundedBy: [
				[54.519290287469204, 34.24300222066421],
				[56.797905844997935, 41.581869408164216]
			]
		}
	});
	searchControl = c;
	myMap.controls.add(c);
	var a = new ymaps.GeoObjectCollection(null, {
		hintContentLayout: ymaps.templateLayoutFactory.createClass("$[properties.name]")
	});
	c.events.add("resultselect", function(a) {
		a = a.get("index");
		c.getResult(a).then(function(a) {
			getDistance(a.geometry.getCoordinates())
		})
	}).add("submit", function() {
		a.removeAll()
	})
}

function prepareData() {
	mkad_poly = new ymaps.Polygon([poly]);
	ymaps.geoQuery(mkad_poly).setOptions("visible", !1).addToMap(myMap);
	var c = new ymaps.GeoObjectCollection({}),
		a = new ymaps.GeoObjectCollection({});
	b_junctions.forEach(function(g) {
		c.add(new ymaps.Placemark(g));
		a.add(new ymaps.Placemark(g))
	});
	s_junctions.forEach(function(c) {
		a.add(new ymaps.Placemark(c))
	});
	bjGq = ymaps.geoQuery(c).setOptions("visible", !1).addToMap(myMap);
	jGq = ymaps.geoQuery(a).setOptions("visible", !1).addToMap(myMap);
	poly = a = c = s_junctions = b_junctions = null
}

function getDistance(c) {
	clearPrev();
	layout.showLoading();
	if (checkIn(c)) layout.showMessage("\u0422\u043e\u0447\u043a\u0430 \u043d\u0430\u0445\u043e\u0434\u0438\u0442\u0441\u044f \u0432\u043d\u0443\u0442\u0440\u0438 \u041c\u041a\u0410\u0414");
	else {
		var a = [];
		routeFromCenter(c, function(g, l) {
			a.push(l[0]);
			var q = findNearest(jGq, c, 1),
				n = [],
				n = 3500 > getPointDistance(q[0], c) ? findNearest(jGq, c, 7) : findNearest(bjGq, c, 5);
			n.forEach(function(c) {
				c[0] == l[0][0] && c[1] == l[0][1] || a.push(c)
			});
			async.map(a, function(a, g) {
				getRoute(a, c, g)
			}, function(a, g) {
				var l = g.map(function(a) {
						return a.getLength()
					}),
					l = indexOfSmallest(l);
				showResults(g[l], c)
			})
		})
	};

}

function showResults(c, a, g) {
	var l = humanReadableDistance(c.getLength());
	var auto = autoReadableDistance(c.getLength());

	c.getPaths().options.set({
		strokeColor: "ff0000"
	});
	c.getWayPoints().each(function(a) {
		"1" == a.properties.get("iconContent") && (a.properties.set("iconContent", "\u041c\u041a\u0410\u0414"), a.options.set("preset", "islands#blueStretchyIcon"), a.geometry.getCoordinates(), a.properties.set("balloonContent", ""), a.events.add("click", layout.showExistsLink));
		"2" == a.properties.get("iconContent") && (a.options.set("preset", "islands#blueStretchyIcon"), a.properties.set("iconContent", l), a.geometry.getCoordinates(), a.properties.set("balloonContent", ""), a.events.add("click", layout.showExistsLink))
	});
	collection.add(c);
	g || stat.reachGoal("Distance", {
		length: l,
		coords: a
	});
	layout.hideLoading();

	
    /*myMap.balloon.open(coords, {
        contentHeader:'Событие!',
        contentBody:'<p>Кто-то щелкнул по карте.</p>' +
            '<p>Координаты щелчка: ' + [
            coords[0].toPrecision(6),
            coords[1].toPrecision(6)
            ].join(', ') + '</p>',
        contentFooter:'<sup>Щелкните еще раз</sup>'
    });*/

	var dist = Math.round(auto) + ' км';
	
	document.getElementById('distance_mkad').textContent = dist;

	// сделать функции и проверку на пустоту ценника

		var fiz_data = document.getElementById('fiz_data').textContent.replace(/[^-0-9]/gim,''),
			yur_data = document.getElementById('yur_data').textContent.replace(/[^-0-9]/gim,''); 

			// fiz_data = fiz_data.replace(/[^-0-9]/gim,'');
			// yur_data = yur_data.replace(/[^-0-9]/gim,'');

		document.getElementById('fiz_rez').textContent = Math.ceil(auto) * fiz_data * 2 + ' руб.';
		document.getElementById('yur_rez').textContent = Math.ceil(auto) * yur_data * 2 + ' руб.';
		
		/* ***** */
		myMap.balloon.open(a, {
	        contentHeader:'Расстояние до объекта - '+ dist,
	        contentBody:'<p style="text-align:center;"><b>Расчет цены</b></p>'+
	        	'<p>Для физ.лиц: ' + Math.ceil(auto) * fiz_data * 2 + ' руб.</p>'+
	        	'<p>Для юр.лиц: ' + Math.ceil(auto) * yur_data * 2 + ' руб.</p>'
	        // contentFooter:'<sup>Щелкните еще раз</sup>'
	    });
	    /* ***** */

}

function clearPrev() {
	collection.removeAll();
	stat.onceClear("link-click");
	stat.onceClear("link-keydown")
}

function checkIn(c) {
	c = new ymaps.Placemark(c);
	var a = ymaps.geoQuery(c).setOptions("visible", !1).addToMap(myMap).searchInside(mkad_poly).getLength();
	myMap.geoObjects.remove(c);
	return a
}

function routeFromCenter(c, a) {
	getRoute([55.75119082121071, 37.61699737548825], c, function(c, l) {
		var q = [];
		ymaps.geoQuery(l.getPaths()).each(function(a) {
			a = a.geometry.getCoordinates();
			for (var c = 1, g = a.length; c < g; c++) q.push({
				type: "LineString",
				coordinates: [a[c], a[c - 1]]
			})
		});
		var n = ymaps.geoQuery(q).setOptions("visible", !1).addToMap(myMap),
			k = n.searchInside(mkad_poly),
			k = n.remove(k).get(0).geometry.getCoordinates()[1];
		n.removeFromMap(myMap);
		n = findNearest(bjGq, k, 1);
		a(null, n)
	})
}

function findNearest(c, a, g) {
	c = c.sortByDistance(a);
	a = [];
	for (var l = 0; l < g; l++) a.push(c.get(l).geometry.getCoordinates());
	return a
}

function getPointDistance(c, a) {
	return myMap.options.get("projection").getCoordSystem().getDistance(c, a)
}

function indexOfSmallest(c) {
	return c.indexOf(Math.min.apply(Math, c))
}

function getRoute(c, a, g) {
	ymaps.route([c, a]).done(function(a) {
		g(null, a)
	})
}

function humanReadableDistance(c) {
	c = Math.round(c);
	var a = "";
	return a = 100 > c ? c + " \u043c" : 1E3 > c ? Math.round(c / 10) + "0 \u043c" : 1E4 > c ? parseFloat((c / 1E3).toFixed(1)) + " \u043a\u043c" : Math.round(c / 1E3) + " \u043a\u043c"
}

function autoReadableDistance(c) {
	c = Math.round(c);
	var a = "";

	return a = parseFloat((c / 1E3).toFixed(1));
}

var api = {
		saveCoords: function(c, a, g, l, q, n) {
			pegasus("/api/s/" + c + "/" + a + "/" + g + "/" + l + "/").then(function(a) {
				n(a.id)
			})
		},
		loadCoords: function(c, a) {
			pegasus("/api/" + c).then(a)
		}
	},
	layout = {
		url: "http://mkad.mapcraft.ru/m/",
		hideLoading: function() {
			document.getElementById("loading").style.display = "none"
		},
		showLoading: function() {
			document.getElementById("loading").style.display = ""
		},
		showMessage: function(c) {
			layout.hideLoading();
			var a = document.getElementById("message");
			a.innerHTML = c;
			a.style.display = "";
			setTimeout(function() {
				a.style.display = "none"
			}, 1200)
		},
		showLink: function(c, a, g) {
			api.saveCoords(c[0], c[1], a[0], a[1], g, function(a) {
				document.getElementById("link-value").value = layout.url + a;
				document.getElementById("link-panel").style.display = "block"
			})
		},
		showExistsLink: function() {
			document.getElementById("link-panel").style.display = "block";
			layout.linkInputSelect()
		},
		hideLink: function() {
			document.getElementById("link-panel").style.display = "none"
		},
		linkInputSelect: function() {
			var c = document.getElementById("link-value");
			c.focus();
			c.setSelectionRange(0, c.value.length)
		},
		init: function() {
			Gator(document).on("click", "#link-value", function() {
				layout.linkInputSelect();
				stat.reachGoalOnce("link-click")
			});
			Gator(document).on("click", "#link-close", layout.hideLink);
			Gator(document).on("keydown", "#link-value", function() {
				stat.reachGoalOnce("link-keydown")
			})
		}
	};
layout.init();
var stat = {
	yObj: "yaCounter37085125",
	reachGoal: function(c, a) {
		window[stat.yObj] && window[stat.yObj].reachGoal(c, a);
		window.ga && window.ga("send", "event", c)
	},
	onceCounter: {},
	reachGoalOnce: function(c, a) {
		stat.onceCounter[c] || (stat.onceCounter[c] = !0, stat.reachGoal(c, a))
	},
	onceClear: function(c) {
		delete stat.onceCounter[c]
	}
};