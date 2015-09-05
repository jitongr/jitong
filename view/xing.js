/**
 * Created by Administrator on 2014/12/19.
 */
var PointList = [
        {id: 0, x: 377, y: 389, r: 61.5, name: "济童", nameX: 354, nameY: 361, information: ""},
        {id: 1, x: 336, y: 292, r: 17, name: "饥饿", nameX: 358, nameY: 286, information: ""},
        {id: 2, x: 295, y: 283, r: 14.5, name: "寒冷", nameX: 313, nameY: 273, information: ""},
        {id: 3, x: 182, y: 335, r: 31.5, name: "困苦", nameX: 103, nameY: 370, information: ""},
        {id: 4, x: 166, y: 402, r: 14.5, name: "疾病", nameX: 108, nameY: 430, information: ""},
        {id: 5, x: 266, y: 410, r: 11, name: "被劳役", nameX: 203, nameY: 439, information: ""},
        {id: 6, x: 298, y: 461, r: 9, name: "孤寂", nameX: 255, nameY: 479, information: ""},
        {id: 7, x: 319, y: 524, r: 14.5, name: "被虐待", nameX: 270, nameY: 566, information: ""},
        {id: 10, x: 526, y: 513, r: 61.5, name: "遗童", nameX: 485, nameY: 498, information: ""},
        {id: 11, x: 645, y: 463, r: 22.5, name: "前世害死的儿童", nameX:600, nameY: 440, information: ""},
        {id: 12, x: 665, y: 499, r: 8, name: "婴灵", nameX: 681, nameY: 499, information: ""},
		 {id: 15, x: 675, y: 469, r: 8, name: "前家族孽害孩童", nameX: 640, nameY: 460, information: ""},
        {id: 13, x: 666, y: 544, r: 6, name: "难童", nameX: 681, nameY: 544, information: ""},
        {id: 14, x: 564, y: 612, r: 8.5, name: "夭折的孩童", nameX: 511, nameY: 638, information: "。"},
        {id: 20, x: 1106, y: 372, r: 61.5, name: "祭童", nameX: 1087, nameY: 349, information: "济童。"},
        {id: 21, x: 1098, y: 248, r: 29.5, name: "苦难", nameX: 1134, nameY: 236, information: ""},
        {id: 22, x: 1025, y: 227, r: 14.5, name: "鞭打", nameX: 1052, nameY: 217, information: ""},
        {id: 23, x: 958, y: 243, r: 10, name: "绑在树上", nameX: 968, nameY: 230, information: "。"},
        {id: 24, x: 929, y: 263, r: 17.5, name: "吊起来", nameX: 879, nameY: 287, information: ""},
        {id: 25, x: 979, y: 466, r: 7, name: "被卖身", nameX: 950, nameY: 496, information: "。"},
        {id: 26, x: 1031, y: 275, r: 7, name: "赤身裸体", nameX: 962, nameY: 303, information: "。"},
        {id: 27, x: 897, y: 368, r: 9, name: "反绑双手", nameX: 844, nameY: 388, information: ""},
        {id: 28, x: 923, y: 430, r: 14.5, name: "钉十字架", nameX: 857, nameY: 459, information: "。"},
        {id: 29, x: 944, y: 448, r: 7, name: "捆绑脚", nameX: 904, nameY: 470, information: ""},
        {id: 30, x: 744, y: 223, r: 61.5, name: "继童", nameX: 722, nameY: 199, information: ""},
        {id: 31, x: 856, y: 177, r: 13.5, name: "圣洁", nameX: 875, nameY: 174, information: ""},
        {id: 32, x: 833, y: 125, r: 7.5, name: "少年", nameX: 846, nameY: 123, information: ""},
        {id: 33, x: 817, y: 106, r: 10.5, name: "孩童", nameX: 834, nameY: 100, information: ""},
        {id: 34, x: 738, y: 90, r: 16, name: "天真", nameX: 758, nameY: 82, information: ""},
        {id: 35, x: 705, y: 106, r: 10.5, name: "幼小", nameX: 656, nameY: 121, information: ""},
        {id: 36, x: 665, y: 166, r: 7.5, name: "单纯", nameX: 636, nameY: 180, information: ""},
        {id: 41, x: 454, y: 189, r: 15.5, name: "念佛、祷告", nameX: 481, nameY: 183, information: ""},
        {id: 42, x: 606, y: 296, r: 21, name: "佛童", nameX: 576, nameY: 298, information: ""},
        {id: 43, x: 582, y: 316, r: 11, name: "小天使", nameX: 530, nameY: 336, information: ""},
        {id: 44, x: 755, y: 337, r: 20, name: "十字架", nameX: 693, nameY: 374, information: ""},
        {id: 45, x: 792, y: 420, r: 11, name: "小耶稣", nameX: 742, nameY: 444, information: ""},
        {id: 46, x: 824, y: 415, r: 21, name: "绑十字架", nameX: 798, nameY: 456, information: ""},
        {id: 47, x: 720, y: 570, r: 7, name: "孤儿", nameX: 736, nameY: 566, information: ""},
        {id: 48, x: 853, y: 583, r: 7, name: "被活埋", nameX: 869, nameY: 595, information: "。"},
        {id: 49, x: 1016, y: 518, r: 11.5, name: "被献祭", nameX: 1041, nameY: 526, information: "。"}
    ],
//大图下的白色阴影
    BgList = [
        {id: 1, x: 288, y: 406, r: 121.5},
        {id: 2, x: 577, y: 524, r: 90.5},
        {id: 3, x: 1016, y: 351, r: 121.5},
        {id: 4, x: 759, y: 185, r: 96}
    ],
//曲线列表
    BezierList = [
        {point0Id: 0, anchor0X: 384, anchor0Y: 403, handle0X: 403, handle0Y: -85, to: "<", point1Id: 20, anchor1X: 1098, anchor1Y: 406, handle1X: 1078, handle1Y: -58, viaPointId: 41},
        {point0Id: 0, anchor0X: 405, anchor0Y: 390, handle0X: 703, handle0Y: 448, to: "<", point1Id: 20, anchor1X: 1092, anchor1Y: 376, handle1X: 962, handle1Y: 409, viaPointId: 46},
        {point0Id: 0, anchor0X: 392, anchor0Y: 391, handle0X: 392, handle0Y: 391, to: ">", point1Id: 20, anchor1X: 1113, anchor1Y: 387, handle1X: 680, handle1Y: 252, viaPointId: 44},
        {point0Id: 10, anchor0X: 521, anchor0Y: 474, handle0X: 521, handle0Y: 474, to: "<", point1Id: 20, anchor1X: 756, anchor1Y: 346, handle1X: 546, handle1Y: 360, viaPointId: 44},
        {point0Id: 10, anchor0X: 756, anchor0Y: 346, handle0X: 884, handle0Y: 337, to: "<", point1Id: 20, anchor1X: 1117, anchor1Y: 389, handle1X: 1060, handle1Y: 373, viaPointId: 44},
        {point0Id: 10, anchor0X: 519, anchor0Y: 476, handle0X: 519, handle0Y: 476, to: ">", point1Id: 30, anchor1X: 742, anchor1Y: 225, handle1X: 509, handle1Y: 276, viaPointId: 42},
        {point0Id: 10, anchor0X: 528, anchor0Y: 516, handle0X: 727, handle0Y: 622, to: "<", point1Id: 20, anchor1X: 1077, anchor1Y: 389, handle1X: 985, handle1Y: 579, viaPointId: 47},
        {point0Id: 10, anchor0X: 538, anchor0Y: 533, handle0X: 724, handle0Y: 654, to: "<", point1Id: 20, anchor1X: 1080, anchor1Y: 396, handle1X: 999, handle1Y: 594, viaPointId: 48},
        {point0Id: 10, anchor0X: 545, anchor0Y: 554, handle0X: 756, handle0Y: 685, to: ">", point1Id: 20, anchor1X: 1085, anchor1Y: 397, handle1X: 1015, handle1Y: 616, viaPointId: 49},
        {point0Id: 10, anchor0X: 521, anchor0Y: 463, handle0X: 521, handle0Y: 463, to: ">", point1Id: 20, anchor1X: 609, anchor1Y: 304, handle1X: 538, handle1Y: 334, viaPointId: 42},
        {point0Id: 10, anchor0X: 609, anchor0Y: 304, handle0X: 668, handle0Y: 279, to: ">", point1Id: 20, anchor1X: 1088, anchor1Y: 375, handle1X: 914, handle1Y: 305, viaPointId: 42}
    ],
//直线列表
    LineList = [
        {point0Id: 0, to: ">", point1Id: 1},
        {point0Id: 0, to: ">", point1Id: 2},
        {point0Id: 0, to: ">", point1Id: 3},
        {point0Id: 0, to: ">", point1Id: 4},
        {point0Id: 0, to: ">", point1Id: 5},
        {point0Id: 0, to: ">", point1Id: 6},
        {point0Id: 0, to: ">", point1Id: 7},
        {point0Id: 1, to: ">", point1Id: 0},
        {point0Id: 2, to: ">", point1Id: 3},
      //  {point0Id: 3, to: "<", point1Id: 1},
        {point0Id: 3, to: "<", point1Id: 2},
        {point0Id: 3, to: "<", point1Id: 4},
        {point0Id: 3, to: "<", point1Id: 5},
        {point0Id: 3, to: "<", point1Id: 6},
     //   {point0Id: 3, to: "<", point1Id: 7},
        {point0Id: 4, to: ">", point1Id: 3},
        {point0Id: 5, to: ">", point1Id: 3},
        {point0Id: 6, to: ">", point1Id: 3},
        {point0Id: 7, to: ">", point1Id: 0},
        {point0Id: 10, to: "<", point1Id: 11},
        {point0Id: 10, to: "<", point1Id: 12},
        {point0Id: 10, to: "<", point1Id: 13},
        {point0Id: 10, to: "<", point1Id: 14},
        {point0Id: 11, to: ">", point1Id: 10},
        {point0Id: 12, to: ">", point1Id: 10},
        {point0Id: 13, to: ">", point1Id: 10},
        {point0Id: 13, to: "<", point1Id: 12},
        {point0Id: 13, to: "<", point1Id: 14},
        {point0Id: 14, to: ">", point1Id: 10},
        {point0Id: 20, to: ">", point1Id: 21},
        {point0Id: 20, to: ">", point1Id: 22},
        {point0Id: 20, to: ">", point1Id: 23},
        {point0Id: 20, to: ">", point1Id: 24},
        {point0Id: 20, to: ">", point1Id: 25},
        {point0Id: 20, to: ">", point1Id: 26},
        {point0Id: 20, to: ">", point1Id: 27},
        {point0Id: 20, to: ">", point1Id: 28},
        {point0Id: 20, to: ">", point1Id: 29},
        {point0Id: 21, to: ">", point1Id: 20},
        {point0Id: 21, to: "<", point1Id: 22},
        {point0Id: 21, to: "<", point1Id: 23},
        {point0Id: 21, to: "<", point1Id: 24},
        {point0Id: 21, to: "<", point1Id: 25},
        {point0Id: 21, to: "<", point1Id: 26},
        {point0Id: 21, to: "<", point1Id: 27},
        {point0Id: 21, to: "<", point1Id: 28},
        {point0Id: 21, to: "<", point1Id: 29},
        {point0Id: 22, to: ">", point1Id: 21},
        {point0Id: 22, to: ">", point1Id: 24},
        {point0Id: 23, to: ">", point1Id: 21},
        {point0Id: 24, to: ">", point1Id: 21},
        {point0Id: 24, to: ">", point1Id: 22},
        {point0Id: 25, to: ">", point1Id: 20},
        {point0Id: 25, to: ">", point1Id: 21},
        {point0Id: 25, to: ">", point1Id: 22},
        {point0Id: 25, to: ">", point1Id: 23},
        {point0Id: 25, to: ">", point1Id: 24},
        {point0Id: 25, to: ">", point1Id: 26},
        {point0Id: 25, to: ">", point1Id: 27},
        {point0Id: 25, to: ">", point1Id: 28},
        {point0Id: 26, to: ">", point1Id: 20},
        {point0Id: 26, to: ">", point1Id: 21},
        {point0Id: 26, to: ">", point1Id: 22},
        {point0Id: 26, to: ">", point1Id: 23},
        {point0Id: 26, to: ">", point1Id: 24},
        {point0Id: 26, to: ">", point1Id: 25},
        {point0Id: 26, to: ">", point1Id: 27},
        {point0Id: 26, to: ">", point1Id: 28},
        {point0Id: 27, to: ">", point1Id: 21},
        {point0Id: 28, to: ">", point1Id: 21},
        {point0Id: 29, to: ">", point1Id: 21},
        {point0Id: 29, to: ">", point1Id: 27},
        {point0Id: 30, to: ">", point1Id: 31},
        {point0Id: 30, to: ">", point1Id: 32},
        {point0Id: 30, to: ">", point1Id: 33},
        {point0Id: 30, to: ">", point1Id: 34},
        {point0Id: 30, to: ">", point1Id: 35},
        {point0Id: 30, to: ">", point1Id: 36},
        {point0Id: 31, to: ">", point1Id: 30},
        {point0Id: 32, to: ">", point1Id: 30},
        {point0Id: 33, to: ">", point1Id: 30},
        {point0Id: 34, to: ">", point1Id: 30},
        {point0Id: 35, to: ">", point1Id: 30},
        {point0Id: 36, to: ">", point1Id: 30}
    ], WIDTH = 1180, HEIGHT = 701, time = 0, mouseX = 0, mouseY = 0, mouseOverObject = null, timer = 0;

$(document).ready(function () {


//    $('body').css("margin",0);
//    $('body').css("padding",0);
//    $('body').css("width",$(window).width());
//    $('body').css("height",$(window).height());
//    $('body').css("display",'block');



    var canvas, context, textRender, pointRender, backgroundShadowRender, BezierCurveRender, LineRender, description, pointHolder, bglistHolder, bezierHolder, lineHolder, o, pointImage, backgroundShodow, bezierCurveLine, strightLine, backgroundImage, backshadowImage, b2bImage, xiaofeiImage, saleImage, o2oImage;

    function updateMouseXYValue(mousePoint) {
        mouseX = mousePoint.clientX + $(window).scrollLeft() - $(canvas).offset().left;
        mouseY = mousePoint.clientY + $(window).scrollTop() - $(canvas).offset().top;
//        console.log("mosueX"+mouseX);
//        console.log("mouseY"+mouseY);
    }

    /**
     * 在左上角写入文字
     * @param a
     * @param c
     * @param d
     * @param e
     * @returns {number}
     */
    function drawText(a, c, d, e) {
        var h, i, f = 0, g = 12;
        for (h = 0; h < a.length; h++){
            i = a.charAt(h);
            context.fillText(i, c + f, d + g);
            f += context.measureText(i).width + 1;
            f > e && (f = 0, g += 18.27);
        }
        return g
    }

    /**
     * 获取两个点之前的距离
     * @param x1
     * @param y1
     * @param x2
     * @param y2
     * @returns {number}
     */
    function getdistance(x1, y1, x2, y2) {
        return Math.sqrt((x2 - x1) * (x2 - x1) + (y2 - y1) * (y2 - y1));
    }

    /**
     * 根据id获取对象
     * @param id
     * @returns {*}
     * @constructor
     */
    function findPointById(id) {
        for (var i = 0; i < pointHolder.length; i++){
            if (pointHolder[i].id == id){
                return pointHolder[i];
            }
        }
    }


    (function initEnvironment(){

        $("#mainCanvas").attr("width", WIDTH);
        $("#mainCanvas").attr("height", HEIGHT);
        canvas = document.getElementById("mainCanvas");
        context = canvas.getContext("2d");
        canvas.addEventListener("mousemove", updateMouseXYValue, !1);

        textRender = function () {
            this.x = 73;
            this.y = 100;
            this.text = "";
            this.offsetY = 0;
            this.width = 250;
            this.top = 72;
            this.bottom = 137;
            this.startY = 0;
            this.h = 0;
            this.color = "#54e2ce";
            this.alpha = new Array;
            this.n = 20;

            var a;
            for (a = 0; a < .5 * this.n; a++){
                this.alpha[a] = 2 * ((this.n - a) / this.n - .5);
            }

            for (a = .5 * this.n; a < this.n; a++){
                this.alpha[a] = 2 * (a / this.n - .5);
            }
        };

        textRender.prototype.display = function () {
            null != mouseOverObject && (context.globalAlpha = timer < this.n ? this.alpha[timer] : 1);
            context.lineWidth = 1;
            context.strokeStyle = this.color;
            context.fillStyle = this.color;
            context.beginPath();
            context.arc(this.x - 24, this.y + 15, 11.5, 0, 2 * Math.PI);
            context.stroke();
            context.beginPath();
            context.arc(this.x - 43, this.y + 13, 3, 0, 2 * Math.PI);
            context.fill();
            context.beginPath();
            context.arc(this.x - 13, this.y - 7, 1.5, 0, 2 * Math.PI);
            context.fill();
            context.font = "18px Times";
            context.fillText("i", this.x - 26, this.y + 20);
            context.fillStyle = "#eaeaea";
            context.font = "12px 'Microsoft YaHei', 微软雅黑";
            this.h = drawText(this.text, this.x, this.y + this.offsetY + this.startY, this.width);
            context.beginPath();
            context.moveTo(this.x, this.y - 18);
            context.lineTo(this.x + this.width, this.y - 18);
            context.stroke();
        };

        pointRender = function (a, b, c, d, e, f, g, h) {
            //上面的参数依次对应pointList中对象的各个属性
            this.id = a, this.x = b, this.y = c, this.r = d, this.name = e, this.nameX = f, this.nameY = g, this.information = h, this.init()
        };

        pointRender.prototype.init = function () {

            this.color = this.id < 10 ? "#ef3c3c" : this.id < 20 ? "#f7b24f" : this.id < 30 ? "#49db6f" : this.id < 40 ? "#2ffee1" : "#a8987d";
            this.over = !1;
            this.highlight = !1;
            this.alpha = new Array;
            this.n = 20;

            for (var a = 0; a < this.n; a++){
                this.alpha[a] = (this.n - a) / this.n + .1;
            }
            if (0 === this.id % 10){
                switch (this.id) {
                    case 0:
                        this.colorAlpha = "rgba(239, 60, 60, 0)";
                        break;
                    case 10:
                        this.colorAlpha = "rgba(247, 178, 79, 0)";
                        break;
                    case 20:
                        this.colorAlpha = "rgba(73, 219, 111, 0)";
                        break;
                    case 30:
                        this.colorAlpha = "rgba(47, 254, 225, 0)"
                }
            }
        };


        pointRender.prototype.display = function () {


            this.highlight || (context.globalAlpha = timer < this.n ? this.alpha[timer] : .1);
            context.beginPath();
            this.over ? context.arc(this.x, this.y, 1.1 * this.r, 0, 2 * Math.PI) : context.arc(this.x, this.y, this.r, 0, 2 * Math.PI);

            if ( 0 === this.id % 10){

                context.beginPath();
                if(this.over){
                    this.grd = context.createRadialGradient(this.x, this.y, .5 * this.r, this.x, this.y, 1.4 * this.r);
                    this.grd.addColorStop(0, this.color);
                    this.grd.addColorStop(1, this.colorAlpha);
                    context.arc(this.x, this.y, 1.4 * this.r, 0, 2 * Math.PI);
                }else{
                    this.grd = context.createRadialGradient(this.x, this.y, .5 * this.r, this.x, this.y, 1.3 * this.r);
                    this.grd.addColorStop(0, this.color);
                    this.grd.addColorStop(1, this.colorAlpha);
                    context.arc(this.x, this.y, 1.3 * this.r, 0, 2 * Math.PI);
                }

                context.fillStyle = this.grd;
                context.fill();
                context.beginPath();

                if(this.over){
                    context.arc(this.x, this.y, 1.1 * this.r, 0, 2 * Math.PI);
                }else{
                    context.arc(this.x, this.y, this.r, 0, 2 * Math.PI);
                }

                context.fillStyle = "#fff";
                context.fill();
                context.lineWidth = 6.62;
                context.strokeStyle = this.color;
                context.stroke();
                context.font = "28px 'Microsoft YaHei', 微软雅黑";
                context.fillStyle = "#f00";
                context.save();
                context.translate(this.nameX, this.nameY);
                context.rotate(-20 * Math.PI / 180);
                context.fillText(this.name, 0, 0);
                context.restore();

                switch (this.id) {
                    case 0:
                        context.drawImage(b2bImage, 342, 363);
                        break;
                    case 10:
                        context.drawImage(xiaofeiImage, 494, 495);
                        break;
                    case 20:
                        context.drawImage(saleImage, 1068, 353);
                        break;
                    case 30:
                        context.drawImage(o2oImage, 714, 200)
                }
            } else{
                context.fillStyle = this.color;
                context.fill();
                this.id > 40 ? context.font = "18px 'Microsoft YaHei', 微软雅黑" : (context.globalAlpha = this.highlight ? null === mouseOverObject ? .8 : 1 : .1, context.font = "18px 'Microsoft YaHei', 微软雅黑");
                context.fillStyle = this.id > 30 && this.id < 37 ? "#f8f":"#ff4";
                context.save();
                context.translate(this.nameX, this.nameY);
                context.rotate(-20 * Math.PI / 180);
                context.fillText(this.name, 0, 0);
                context.restore();
            }
            context.globalAlpha = 1
        };

        pointRender.prototype.checkMouse = function () {
            //判断鼠标是不是在在圆的范围内
            return getdistance(mouseX, mouseY, this.x, this.y) < this.r
        };

        pointRender.prototype.checkMouseEvent = function () {
            this.checkMouse() ? (this.mouseOver(), this.over || (this.over = !0, mouseOverObject = this)) : this.over && (this.over = !1, mouseOverObject = null)
        };
        pointRender.prototype.mouseOver = function () {
            this.font = "18px 'Microsoft YaHei', 微软雅黑";
            this.lineHeight = 18;
            //更改描述信息
//            timer === .5 * this.n && (description.text = this.information);
            timer === .5 * this.n && (description.text = this.id+"_"+this.information);
            description.color = this.color
        };


        backgroundShadowRender = function (a, b, c, d) {
            this.id = a, this.x = b, this.y = c, this.r = d, this.init()
        };
        backgroundShadowRender.prototype.init = function () {
            this.id < 10 ? this.color = "#fff" : this.id < 20 || this.id < 30 || this.id < 40, this.highlight = !1, this.alpha = new Array, this.n = 20;
            for (var a = 0; a < this.n; a++)this.alpha[a] = .2 * ((this.n - a) / this.n)
        };
        backgroundShadowRender.prototype.display = function () {
            context.globalAlpha = this.highlight ? .2 : timer < this.n ? this.alpha[timer] : 0;
            this.id < 10 && (context.beginPath(), context.arc(this.x, this.y, this.r, 0, 2 * Math.PI), context.fillStyle = this.color, context.globalAlpha = this.alpha[timer], context.fill());
            context.globalAlpha = 1;
        };
        BezierCurveRender = function (a, b, c, d, e, f, g, h, i, j, k, l) {
            this.point0 = findPointById(a);
            this.anchor0X = b, this.anchor0Y = c;
            this.handle0X = d, this.handle0Y = e;
            this.to = f, this.point1 = findPointById(g);
            this.anchor1X = h, this.anchor1Y = i;
            this.handle1X = j, this.handle1Y = k;
            this.viaPoint0 = findPointById(l);
            this.viaPoint1 = this.viaPoint0;
            42 === l ? this.viaPoint1 = findPointById(43) : 46 === l && (this.viaPoint1 = findPointById(45));
            this.init()
        };
        BezierCurveRender.prototype.init = function () {
            this.xpath = new Array;
            this.ypath = new Array;
            this.n = 400;
            var a;
            for (a = 0; a < this.n; a++){
                this.xpath[a] = this.PointOnCubicBezier(a / this.n)[0], this.ypath[a] = this.PointOnCubicBezier(a / this.n)[1];
            }
            if (44 === this.viaPoint0.id) {
                if (10 === this.point0.id && 521 === this.anchor0X) {
                    for (a = 0; a < .5 * this.n; a++){
                        this.xpath[a] = this.PointOnCubicBezier(2 * (a / this.n))[0];
                        this.ypath[a] = this.PointOnCubicBezier(2 * (a / this.n))[1];
                    }
                    for (a = .5 * this.n; a < this.n; a++){
                        this.xpath[a] = -2;
                        this.ypath[a] = -2
                    }
                } else if (10 === this.point0.id) {
                    for (a = 0; a < .5 * this.n; a++){
                        this.xpath[a] = -2;
                        this.ypath[a] = -2;
                    }
                    for (a = .5 * this.n; a < this.n; a++){
                        this.xpath[a] = this.PointOnCubicBezier(2 * ((a - .5 * this.n) / this.n))[0];
                        this.ypath[a] = this.PointOnCubicBezier(2 * ((a - .5 * this.n) / this.n))[1];
                    }
                }
            } else if (42 === this.viaPoint0.id){
                if (521 === this.anchor0X) {
                    for (a = 0; a < .5 * this.n; a++){
                        this.xpath[a] = this.PointOnCubicBezier(2 * (a / this.n))[0];
                        this.ypath[a] = this.PointOnCubicBezier(2 * (a / this.n))[1];
                    }
                    for (a = .5 * this.n; a < this.n; a++){
                        this.xpath[a] = -2;
                        this.ypath[a] = -2;
                    }
                } else if (609 === this.anchor0X) {
                    for (a = 0; a < .5 * this.n; a++){
                        this.xpath[a] = -2;
                        this.ypath[a] = -2;
                    }
                    for (a = .5 * this.n; a < this.n; a++){
                        this.xpath[a] = this.PointOnCubicBezier(2 * ((a - .5 * this.n) / this.n))[0];
                        this.ypath[a] = this.PointOnCubicBezier(2 * ((a - .5 * this.n) / this.n))[1];
                    }
                }
            }
        };
        BezierCurveRender.prototype.display = function () {
            var a;
            context.beginPath();
            context.moveTo(this.anchor0X, this.anchor0Y);
            context.bezierCurveTo(this.handle0X, this.handle0Y, this.handle1X, this.handle1Y, this.anchor1X, this.anchor1Y);
            context.lineWidth = 1;
            context.strokeStyle = "#a5a5a5";
            context.stroke();
            a = ">" === this.to ? time % this.n : this.n - time % this.n;
            context.drawImage(pointImage, this.xpath[a] - 12, this.ypath[a] - 12);

        };
        BezierCurveRender.prototype.PointOnCubicBezier = function (a) {
            var b = new Array;
            b.push((this.anchor1X - this.anchor0X - 3 * (this.handle0X - this.anchor0X) - (3 * (this.handle1X - this.handle0X) - 3 * (this.handle0X - this.anchor0X))) * a * a * a + (3 * (this.handle1X - this.handle0X) - 3 * (this.handle0X - this.anchor0X)) * a * a + 3 * (this.handle0X - this.anchor0X) * a + this.anchor0X);
            b.push((this.anchor1Y - this.anchor0Y - 3 * (this.handle0Y - this.anchor0Y) - (3 * (this.handle1Y - this.handle0Y) - 3 * (this.handle0Y - this.anchor0Y))) * a * a * a + (3 * (this.handle1Y - this.handle0Y) - 3 * (this.handle0Y - this.anchor0Y)) * a * a + 3 * (this.handle0Y - this.anchor0Y) * a + this.anchor0Y);
            return b
        };
        LineRender = function (a, b, c) {
            this.point0 = findPointById(a);
            this.point1 = findPointById(c);
            this.to = b;
            this.init()
        };
        LineRender.prototype.init = function () {
            this.xpath = new Array;
            this.ypath = new Array;
            this.n = 200;
            for (var a = 0; a < this.n; a++){
                this.xpath[a] = this.point0.x + (this.point1.x - this.point0.x) * a / this.n;
                this.ypath[a] = this.point0.y + (this.point1.y - this.point0.y) * a / this.n;
            }
        };
        LineRender.prototype.display = function () {
            var a;
            context.beginPath();
            context.moveTo(this.point0.x, this.point0.y);
            context.lineTo(this.point1.x, this.point1.y);
            context.closePath();
            context.lineWidth = .6;
            context.strokeStyle = "#878787";
            context.stroke();
            context.beginPath();
            a = ">" === this.to ? time % this.n : this.n - time % this.n;
            context.drawImage(pointImage, this.xpath[a] - 12, this.ypath[a] - 12);

        };
        description = new textRender;
        pointHolder = new Array;
        bglistHolder = new Array;
        bezierHolder = new Array;
        lineHolder = new Array;
    })();


    for (o = 0; o < PointList.length; o++)
    {
        pointImage = new pointRender(PointList[o].id, PointList[o].x, PointList[o].y, PointList[o].r, PointList[o].name, PointList[o].nameX, PointList[o].nameY, PointList[o].information);
        pointHolder.push(pointImage);
    }
    for (o = 0; o < BgList.length; o++){
        backgroundShodow = new backgroundShadowRender(BgList[o].id, BgList[o].x, BgList[o].y, BgList[o].r);
        bglistHolder.push(backgroundShodow);
    }
    for (o = 0; o < BezierList.length; o++){
        bezierCurveLine = new BezierCurveRender(BezierList[o].point0Id, BezierList[o].anchor0X, BezierList[o].anchor0Y, BezierList[o].handle0X, BezierList[o].handle0Y, BezierList[o].to, BezierList[o].point1Id, BezierList[o].anchor1X, BezierList[o].anchor1Y, BezierList[o].handle1X, BezierList[o].handle1Y, BezierList[o].viaPointId);
        bezierHolder.push(bezierCurveLine);
    }
    for (o = 0; o < LineList.length; o++){
        strightLine = new LineRender(LineList[o].point0Id, LineList[o].to, LineList[o].point1Id);
        lineHolder.push(strightLine);
    }


    backgroundImage = new Image;
    backshadowImage = new Image;
    b2bImage = new Image;
    xiaofeiImage = new Image;
    saleImage = new Image;
    o2oImage = new Image;
    pointImage = new Image;
    backgroundImage.src = "view/xalll.jpg";
    backshadowImage.src = "view/bgPoints.png";
    b2bImage.src = "view/icon0.png";
    xiaofeiImage.src = "view/icon10.png";
    saleImage.src = "view/icon20.png";
    o2oImage.src = "view/icon30.png";
    pointImage.src = "view/point.png";


    window.requestAnimFrame = (function () {
        return window.requestAnimationFrame || window.webkitRequestAnimationFrame || window.mozRequestAnimationFrame || window.oRequestAnimationFrame || window.msRequestAnimationFrame || function (fnction) {
            window.setTimeout(fnction, 683 / 33)
        }
    })();



    (function B() {
        var c, d;

        requestAnimFrame(B);
        context.clearRect(0, 0, canvas.width, canvas.height);
        context.drawImage(backgroundImage, 0, 0);
        null != mouseOverObject && (context.globalAlpha = .1);
        context.drawImage(backshadowImage, 0, 0);
        context.globalAlpha = 1;
        description.display();

        for (c = 0; c < bglistHolder.length; c++){
            bglistHolder[c].highlight = null === mouseOverObject ? !0 : !1, bglistHolder[c].display();
        }
        for (c = 0; c < pointHolder.length; c++){
            pointHolder[c].highlight = null === mouseOverObject || mouseOverObject === pointHolder[c] ? !0 : !1, pointHolder[c].checkMouseEvent();
        }
        for (c = 0; c < bezierHolder.length; c++){
            if(null === mouseOverObject || mouseOverObject === bezierHolder[c].point0 || mouseOverObject === bezierHolder[c].point1 || mouseOverObject === bezierHolder[c].viaPoint0 || mouseOverObject === bezierHolder[c].viaPoint1)
            {
                bezierHolder[c].point0.highlight = !0;
                bezierHolder[c].point1.highlight = !0;
                bezierHolder[c].viaPoint0.highlight = !0;
                bezierHolder[c].viaPoint1.highlight = !0;
                bezierHolder[c].display();
            }
        }
        for (c = 0; c < lineHolder.length; c++){
            //可以这样写
            //mouseOverObject === lineHolder[c].point0 && (lineHolder[c].point0.highlight = !0, lineHolder[c].point1.highlight = !0, lineHolder[c].display());
            //也可以用下面的方式
            if(mouseOverObject === lineHolder[c].point0){
                lineHolder[c].point0.highlight = !0;
                lineHolder[c].point1.highlight = !0;
                lineHolder[c].display();
            }
        }

        if (null != mouseOverObject) {
            switch (mouseOverObject.id) {
                case 31:
                case 32:
                case 33:
                case 34:
                case 35:
                case 36:
                    for (d = 0; d < bezierHolder.length; d++){
                       if(30 === bezierHolder[d].point1.id){
                           bezierHolder[d].point0.highlight = !0;
                           bezierHolder[d].viaPoint0.highlight = !0;
                           bezierHolder[d].viaPoint1.highlight = !0;
                           bezierHolder[d].to = "<";
                           bezierHolder[d].display();
                           bezierHolder[d].to = ">";
                       }
                    }
                    break;
                case 21:
                    for (d = 0; d < bezierHolder.length; d++){
                        if(10 === bezierHolder[d].point0.id && 20 === bezierHolder[d].point1.id){
                            bezierHolder[d].point0.highlight = !0;
                            bezierHolder[d].viaPoint0.highlight = !0;
                            ">" === bezierHolder[d].to ? (bezierHolder[d].to = "<", bezierHolder[d].display(), bezierHolder[d].to = ">") : bezierHolder[d].display();
                        }
                    }
                    break;
                case 41:
                case 49:
                    for (d = 0; d < bezierHolder.length; d++){
                        if(41 === bezierHolder[d].viaPoint0.id || 49 === bezierHolder[d].viaPoint0.id){
                            bezierHolder[d].point0.highlight = !0;
                            bezierHolder[d].viaPoint0.highlight = !0;
                            bezierHolder[d].display()
                        }
                    }
                    break;
                case 42:
                case 43:
                case 45:
                case 46:
                    for (d = 0; d < bezierHolder.length; d++){
                        if(42 === bezierHolder[d].viaPoint0.id || 46 === bezierHolder[d].viaPoint0.id){
                            bezierHolder[d].point0.highlight = !0;
                            bezierHolder[d].point1.highlight = !0;
                            bezierHolder[d].viaPoint0.highlight = !0;
                            bezierHolder[d].viaPoint1.highlight = !0;
                            bezierHolder[d].display();
                        }
                    }
            }
            timer++
        } else {
            timer = 0;
            description.text = "祭童刑全图";
        }
        for (c = 0; c < pointHolder.length; c++){
            pointHolder[c].display();
        }
        time++
    })()
});