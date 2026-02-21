import { Locator, Page } from "@playwright/test";

export class MainPage {
    readonly url: string;

    readonly page: Page;


    constructor(page: Page, url: string) {
        this.url = url;
        this.page = page;
    }
}