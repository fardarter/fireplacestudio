// throw new Error("Did exit");
const baseUrl = "https://poolheatingstudio.co.za";

describe("Home", () => {
  beforeAll(async () => {
    await page.goto(baseUrl);
  });
  it('should display "google" text on page', async () => {
    const baseQuery = ".mask";
    const browser = await page.$eval(baseQuery, (el) => {
      return el.classList;
    });
    expect(Object.values(browser).includes("deployed")).toBe(true);
  });
});
