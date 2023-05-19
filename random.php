// Random Banner Image
                let banner = document.getElementById('banner');
                let heading = document.getElementById('quotes');
                console.log(banner);
                let bannerImg = ['banner/banner1.jpg', 'banner/banner2.jpg', 'banner/banner3.jpg', 'banner/banner4.jpg'];
                let ran = Math.floor(Math.random() * 3);
                console.log(ran)
                banner.style.background = `linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url(${bannerImg[ran]})`;
                banner.style.backgroundSize = '100% 100%';


                // Writing Script
                let quotes = ['PIZZA IS LIKE THE ENTIRE FOOD PYRAMID.', 'I THINK OF DIETING, THEN I EAT PIZZA', `PIZZA IS GOOD MEDICINE FOR DISAPPOINTMENT.`, 'PIZZA MAKES ANYTHING POSSIBLE.', `work hard, be nice, eat pizza`];
                let i = 0;
                let j = 0;
                let img = 0;
                let arrayIncrement = 0;
                setInterval(() => {
                    var content = quotes[arrayIncrement];
                    if (i < content.length) {
                        heading.innerHTML += content[i];
                        i++;
                    }
                    else {
                        content = content.substr(0, content.length - j);
                        heading.innerHTML = content;
                        j++;
                        if (heading.innerHTML.length == 0) {
                            if (arrayIncrement == quotes.length - 1)
                                arrayIncrement = 0;
                            else
                                arrayIncrement += 1;
                            i = 0;
                            j = 0;
                        }
                    }

                }, 200);